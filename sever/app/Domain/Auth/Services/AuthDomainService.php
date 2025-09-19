<?php
namespace App\Domain\Auth\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Services\Contracts\AuthServiceInterface;
use app\Application\Base\BaseService;
use App\Repositories\Contracts\AuthRepositoryInterface;
use App\Rules\UserRules;

class AuthDomainService extends BaseService
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