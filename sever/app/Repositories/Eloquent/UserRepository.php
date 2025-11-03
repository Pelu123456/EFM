<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function create(array $data, ?array $imageData = null)
    {
        $user = $this->model->create($data);

        if ($user && $imageData) {
            $imagePath = $this->storeImage(
                $imageData['file'],
                $imageData['folder'],
                $imageData['file_name']
            );

            $user->update(['avatar_path' => $imagePath]);
            $user->refresh(); 
        }
        
        return $user;
    }
    
    // Override update to handle avatar
    public function update(int $id, array $data, ?array $imageData = null)
    {
        $user = $this->model->findOrFail($id);

        $user->update($data);

        if ($imageData) {

            $oldAvatarPath = $user->avatar;
            
            $newAvatarPath = $this->storeImage(
                $imageData['file'],
                $imageData['folder'],
                $imageData['file_name']
            );
            
            $user->update(['avatar' => $newAvatarPath]);
            
            if ($oldAvatarPath) {
                $this->deleteImage($oldAvatarPath);
            }
            
            $user->refresh();
            
        }elseif ($imageData === null) {
           $this->deleteImage($user->avatar);
           $user->update(['avatar' => null]);
        }        
        return $user;
    }
    
    public function delete(int $id): bool
    {
        $user = $this->model->findOrFail($id);
        
        if ($user->avatar_path) {
            $this->deleteImage($user->avatar);
        }
        
        return $user->delete();
    }

}
