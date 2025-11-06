<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;

class OrganizationRepository extends BaseRepository
{

    public function __construct(Organization $model)
    {
        parent::__construct($model);
    }

    public function create(array $data, ?array $imageData = null)
    {
        $data['user_id'] = Auth::id();
        $organization = $this->model->create($data);

        if ($organization && $imageData) {
            $imagePath = $this->storeImage(
                $imageData['file'],
                $imageData['folder'],
                $imageData['file_name']
            );

            $organization->update(['logo' => $imagePath]);
            $organization->refresh();
        }
        
        return $organization;
    }

    public function update(int $id, array $data, ?array $imageData = null)
    {
        $organization = $this->model->findOrFail($id);
        $data['user_id'] = Auth::id();
        $organization->update($data);

        if ($imageData) {

            $oldLogoPath = $organization->logo;
            
            $newLogoPath = $this->storeImage(
                $imageData['file'],
                $imageData['folder'],
                $imageData['file_name']
            );
            
            $organization->update(['logo' => $newLogoPath]);
            
            if ($oldLogoPath) {
                $this->deleteImage($oldLogoPath);
            }
            
            $organization->refresh();
            
        }elseif ($imageData === null) {
           $this->deleteImage($organization->logo);
           $organization->update(['logo' => null]);
        }        
        return $organization;
    }
    
    public function forceDelete(int $id): bool
    {
        $organization = $this->model->findOrFail($id);
        
        if ($organization->logo) {
            $this->deleteImage($organization->logo);
        }
        
        return $organization->forceDelete();
    }

}
