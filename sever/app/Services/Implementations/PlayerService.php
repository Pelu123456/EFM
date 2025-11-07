<?php

namespace App\Services\Implementations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

use App\Repositories\Eloquent\PlayerRepository;

class PlayerService extends BaseService
{
    protected PlayerRepository $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        parent::__construct($playerRepository);
        $this->playerRepository = $playerRepository;
    }

      protected function beforeStore(array $data): array
    {
       $imageData = null;
        
        if (isset($data['player_avatar']) && $data['player_avatar'] instanceof UploadedFile) {
            $imageData = $this->prepareImage($data['player_avatar'], 'players');
            unset($data['player_avatar']); // Remove UploadedFile from data array
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
        $result = $this->playerRepository->create($prepared['data'], $prepared['imageData']);
        DB::commit();
        
        return $result;
    }

    protected function beforeUpdate(int $id, array $data): array 
    {
         $imageData = null;
        
        if (isset($data['player_avatar']) && $data['player_avatar'] instanceof UploadedFile) {
            $imageData = $this->prepareImage($data['player_avatar'], 'players');
            unset($data['player_avatar']);
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

        
        $result = $this->playerRepository->update($id, $prepared['data'], $prepared['imageData']);
        
        DB::commit();
        
        return $result;
    }

}
