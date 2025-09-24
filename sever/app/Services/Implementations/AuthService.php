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
            if ($token) {
                JWTAuth::invalidate($token);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Đăng xuất thành công'
            ]);
        }catch (\Exception $e){
             return response()->json([
                'status' => 'error',
                'message' => 'Dev bad, system error:" ' . $e->getMessage()
            ], 500);
        }
    }

}