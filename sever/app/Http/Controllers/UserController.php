<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\StoreUserRequest;
use App\Services\Implementations\UserService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        parent::__construct($userService);
    }

    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        return $this->userService->create($validatedData);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $validatedData = $request->validated();
        
        return $this->userService->update($id, $validatedData);
    }

}
