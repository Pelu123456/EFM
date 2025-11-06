<?php

namespace App\Services\Implementations;

use Illuminate\Http\UploadedFile;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\DB;

class UserService extends BaseService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        parent::__construct($userRepository);
        $this->userRepository = $userRepository;
    }
    
    protected function beforeStore(array $data): array
    {
        $imageData = null;
        
        // Prepare image if uploaded
        if (isset($data['avatar']) && $data['avatar'] instanceof UploadedFile) {
            $imageData = $this->prepareImage($data['avatar'], 'users');
            unset($data['avatar']); // Remove UploadedFile from data array
        }

        // Hash password if provided
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        return [
            'data' => $data,
            'imageData' => $imageData
        ];
    }

    public function create(array $data)
    {
        DB::beginTransaction();
        
        $prepared = $this->beforeStore($data);
        $result = $this->userRepository->create($prepared['data'], $prepared['imageData']);
        DB::commit();
        
        return $result;
    }

    protected function beforeUpdate(int $id, array $data): array 
    {
         $imageData = null;
        
        // Prepare image if uploaded
        if (isset($data['avatar']) && $data['avatar'] instanceof UploadedFile) {
            $imageData = $this->prepareImage($data['avatar'], 'users');
            unset($data['avatar']); // Remove UploadedFile from data array
        }
        return [
            'data' => $data,
            'imageData' => $imageData
        ];; 
    }

    public function update(int $id, array $data)
    {
        DB::beginTransaction();
        
        $prepared = $this->beforeUpdate($id, $data);

        
        $result = $this->userRepository->update($id, $prepared['data'], $prepared['imageData']);
        
        DB::commit();
        
        return $result;
    }
}