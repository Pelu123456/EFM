<?php
namespace App\Services\Implementations;

use App\Models\User;
use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Services\Implementations\BaseService;
use App\Repositories\Contracts\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService extends BaseService implements AuthServiceInterface 
{

   protected AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        parent::__construct($authRepository);
        $this->authRepository = $authRepository;
    }

    public function authTest()
    {
        $msg = $this->authRepository->authTest();
        return response()->json(['service' => 'Service OK', 'Repository' => $msg],200);
    }

    // public function store(array $data)
    // {
    //     $validated = $request->validated();
    //     return response()->json([
    //         'validated_data' => $validated,
    //         'request' => $request
    //     ]);
    // }

    public function login(array $data)
    {
        try{
            if (! $token = Auth::guard('api')->attempt($data)) {
                return response()->json([
                    'message' => 'Wrong password or username',
                ], 401);
            }

            return response()->json([
                'access_token' => $token,
                'token_type'   => 'bearer',
                'expires_in'   => Auth::guard('api')->factory()->getTTL() * 60,
                'user'         => Auth::guard('api')->user(),
            ]);

        }
        catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Dev bad, system error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function logout()
    {
        try{
            $token = JWTAuth::getToken();
            if (!$token) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Token not provided'
                ], 401);
            }
            $user = JWTAuth::setToken($token)->authenticate();
            JWTAuth::invalidate($token);
            return response()->json([
                'status' => 'success',
                'message' => 'Logout completed'
            ]);
        } catch (TokenExpiredException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token expired'
            ], 401);
        } catch (TokenInvalidException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid Token'
            ], 401);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dev false, system error: ' . $e->getMessage()
            ], 500);
        }
    }

}