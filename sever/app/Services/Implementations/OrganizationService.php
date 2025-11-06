<?php

namespace App\Services\Implementations;

use Illuminate\Http\UploadedFile;
use App\Repositories\Eloquent\OrganizationRepository;
use Illuminate\Support\Facades\DB;

class OrganizationService extends BaseService
{
    protected OrganizationRepository $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepository)
    {
        parent::__construct($organizationRepository);
        $this->organizationRepository = $organizationRepository;
    }
    
    protected function beforeStore(array $data): array
    {
        $imageData = null;
        
        // Prepare image if uploaded
        if (isset($data['logo']) && $data['logo'] instanceof UploadedFile) {
            $imageData = $this->prepareImage($data['logo'], 'organizations');
            unset($data['logo']); // Remove UploadedFile from data array
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
        $result = $this->organizationRepository->create($prepared['data'], $prepared['imageData']);
        DB::commit();
        
        return $result;
    }

    protected function beforeUpdate(int $id, array $data): array 
    {
         $imageData = null;
        
        if (isset($data['logo']) && $data['logo'] instanceof UploadedFile) {
            $imageData = $this->prepareImage($data['logo'], 'organizations');
            unset($data['logo']);
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

        
        $result = $this->organizationRepository->update($id, $prepared['data'], $prepared['imageData']);
        
        DB::commit();
        
        return $result;
    }
}