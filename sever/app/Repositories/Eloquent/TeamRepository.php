<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class TeamRepository extends BaseRepository
{

    public function __construct(Team $model)
    {
        parent::__construct($model);
    }

    public function getByParentId($id)
    {
        $teamData = Team::join('organizations', 'teams.organization_id', '=', 'organizations.id')
            ->select('teams.name',
                'teams.founded_year',
                'teams.home_city',
                'teams.logo',
                'organizations.name as organize')
                ->where('teams.organization_id', $id)
                ->get();
        return $teamData;
    }

    public function create(array $data, ?array $imageData = null)
    {
        $data['user_id'] = Auth::id();
        $team = $this->model->create($data);

        if ($team && $imageData) {
            $imagePath = $this->storeImage(
                $imageData['file'],
                $imageData['folder'],
                $imageData['file_name']
            );

            $team->update(['logo' => $imagePath]);
            $team->refresh();
        }
        
        return $team;
    }

    public function find($id)
    {
        $teamData = Team::join('organizations', 'teams.organization_id', '=', 'organizations.id')
            ->select('teams.name',
                'teams.founded_year',
                'teams.home_city',
                'teams.logo',
                'organizations.name as organize')
                ->where('teams.id', $id)
                ->first();
        return $teamData;
    }

    public function update(int $id, array $data, ?array $imageData = null)
    {
        $team = $this->model->findOrFail($id);
        $data['user_id'] = Auth::id();
        $team->update($data);

        if ($imageData) {

            $oldLogoPath = $team->logo;
            
            $newLogoPath = $this->storeImage(
                $imageData['file'],
                $imageData['folder'],
                $imageData['file_name']
            );
            
            $team->update(['logo' => $newLogoPath]);
            
            if ($oldLogoPath) {
                $this->deleteImage($oldLogoPath);
            }
            
            $team->refresh();
            
        }elseif ($imageData === null) {
           $this->deleteImage($team->logo);
           $team->update(['logo' => null]);
        }        
        return $team;
    }
    
    public function forceDelete(int $id): bool
    {
        $team = $this->model->findOrFail($id);
        
        if ($team->logo) {
            $this->deleteImage($team->logo);
        }
        
        return $team->forceDelete();
    }

}
