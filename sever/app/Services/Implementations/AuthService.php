<?php
namespace App\Services\Implementations;

use App\Models\User;
use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Services\Implementations\BaseService;
use App\Repositories\Contracts\AuthRepositoryInterface;

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
}