<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class PlayerRepository extends BaseRepository
{

    public function __construct(Player $model)
    {
        parent::__construct($model);
    }
     public function create(array $data, ?array $imageData = null)
    {
        $data['user_id'] = Auth::id();
        $player = $this->model->create($data);

        if ($player && $imageData) {
            $imagePath = $this->storeImage(
                $imageData['file'],
                $imageData['folder'],
                $imageData['file_name']
            );

            $player->update(['player_avatar' => $imagePath]);
            $player->refresh(); 
        }
        
        return $player;
    }
    public function find($id)
    {
       $player = Player::join('teams', 'players.team_id', '=', 'teams.id')
        ->join('organizations', 'teams.organization_id', '=', 'organizations.id')
        ->join('positions', 'players.position_id', '=', 'positions.id')
        ->join('position_aliases', 'positions.position_alias_id', '=', 'position_aliases.id')
        ->select(
            'players.full_name',
            'players.birth_date',
            'players.nationality',
            'players.player_avatar',
            'teams.name as team_name',
            'organizations.name as organization_name',
            'positions.code_name as position_code',
            'position_aliases.name as position_alias_name'
        )
        ->where('players.id','=',$id)
        ->first();
        return $player;
    }
    public function getByParentId($id)
    {
        $players = Player::select('players.full_name')->where('team_id','=',$id)->get();
        return $players;
    }
    // Override update to handle avatar
    public function update(int $id, array $data, ?array $imageData = null)
    {
        $player = $this->model->findOrFail($id);

        $player->update($data);

        if ($imageData) {

            $oldAvatarPath = $player->player_avatar;
            
            $newAvatarPath = $this->storeImage(
                $imageData['file'],
                $imageData['folder'],
                $imageData['file_name']
            );
            
            $player->update(['player_avatar' => $newAvatarPath]);
            
            if ($oldAvatarPath) {
                $this->deleteImage($oldAvatarPath);
            }
            
            $player->refresh();
            
        }elseif ($imageData === null) {
           $this->deleteImage($player->player_avatar);
           $player->update(['player_avatar' => null]);
        }        
        return $player;
    }
    
    public function forceDelete(int $id): bool
    {
        $player = $this->model->findOrFail($id);
        
        if ($player->player_avatar) {
            $this->deleteImage($player->player_avatar);
        }
        
        return $player->forceDelete();
    }


}
