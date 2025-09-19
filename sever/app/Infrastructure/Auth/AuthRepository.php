<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\User;
use App\Repositories\Contracts\AuthRepositoryInterface;

class AuthRepository extends BaseRepository implements AuthRepositoryInterface
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }


    public function authTest()
    {
        return "Auth Repo Testing Success";
    }

}
