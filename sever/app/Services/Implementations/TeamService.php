<?php

namespace App\Services\Implementations;

use Illuminate\Http\UploadedFile;
use App\Repositories\Eloquent\TeamRepository;
use Illuminate\Support\Facades\DB;

class TeamService extends BaseService
{
    protected TeamRepository $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        parent::__construct($teamRepository);
        $this->teamRepository = $teamRepository;
    }    
    protected function beforeStore(array $data): array
    {
        $imageData = null;
        
        // Prepare image if uploaded
        if (isset($data['logo']) && $data['logo'] instanceof UploadedFile) {
            $imageData = $this->prepareImage($data['logo'], 'teams');
            unset($data['logo']); // Remove UploadedFile from data array
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
        $result = $this->teamRepository->create($prepared['data'], $prepared['imageData']);
        DB::commit();
        
        return $result;
    }

    protected function beforeUpdate(int $id, array $data): array 
    {
         $imageData = null;
        
        if (isset($data['logo']) && $data['logo'] instanceof UploadedFile) {
            $imageData = $this->prepareImage($data['logo'], 'teams');
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

        
        $result = $this->teamRepository->update($id, $prepared['data'], $prepared['imageData']);
        
        DB::commit();
        
        return $result;
    }
}