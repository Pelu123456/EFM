<?php

namespace App\Services\Implementations;

use App\Services\Contracts\AuthServiceInterface;
use App\Repositories\Contracts\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use App\Exceptions\AuthException;

class AuthService extends BaseService implements AuthServiceInterface
{
    protected AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        parent::__construct($authRepository);
        $this->authRepository = $authRepository;
    }

    public function authTest(): array
    {
        $msg = $this->authRepository->authTest();
        return [
            'service' => 'Service OK',
            'repository' => $msg
        ];
    }

    public function login(array $data): array
    {
        if (! $token = Auth::guard('api')->attempt($data)) {
            throw new AuthException('Wrong password or username', 401);
        }

        return [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => Auth::guard('api')->factory()->getTTL() * 60,
            'user'         => Auth::guard('api')->user(),
        ];
    }

    public function logout(): array
    {
        $token = JWTAuth::getToken();
        if (!$token) {
            throw new AuthException('Token not provided', 401);
        }

        try {
            JWTAuth::setToken($token)->authenticate();
            JWTAuth::invalidate($token);
        } catch (TokenExpiredException $e) {
            throw new AuthException('Token expired', 401);
        } catch (TokenInvalidException $e) {
            throw new AuthException('Invalid token', 401);
        }

        return ['message' => 'Logout completed'];
    }

    public function refresh(): array
    {
        try {
            $newToken = Auth::guard('api')->refresh();
        } catch (TokenExpiredException $e) {
            throw new AuthException('Token expired, please login again', 401);
        } catch (TokenInvalidException $e) {
            throw new AuthException('Invalid token', 401);
        } catch (\Exception $e) {
            throw new AuthException('Token refresh failed: ' . $e->getMessage(), 500);
        }

        return [
            'access_token' => $newToken,
            'token_type'   => 'bearer',
            'expires_in'   => Auth::guard('api')->factory()->getTTL() * 60,
            'user'         => Auth::guard('api')->user(),
        ];
    }
}
