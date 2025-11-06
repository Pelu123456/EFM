<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $item = $this->find($id);

        if (!$item) {
            return null;
        }

        $item->update($data);
        return $item->refresh();
    }


    public function delete(int $id)
    {
        $item = $this->find($id);
        return $item ? $item->delete() : false;
    }


    protected function storeImage(UploadedFile $file, string $folder, string $fileName): string
    {
        try {
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            
            $path = $file->storeAs($folder, $fileName, 'public');
            $url = config('app.url') . Storage::disk('public')->url($path);
            Log::info('Request all data:', $data);
            
        } catch (\Throwable $e) {
            $publicPath = public_path("storage/{$folder}");
            if (!is_dir($publicPath)) {
                mkdir($publicPath, 0775, true);
            }
            
            $file->move($publicPath, $fileName);
            $path = "storage/{$folder}/{$fileName}";
            $url = config('app.url') . '/' . $path;
        }
        
        return $path;
    }

     protected function deleteImage(?string $path): void
    {
        if (!$path) {
            return;
        }
        try {
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        } catch (\Throwable $e) {
            // Fallback: delete from public path
            $fullPath = public_path($path);
            if (file_exists($fullPath) && is_file($fullPath)) {
                unlink($fullPath);
            }
        }
    }

    public function restore(int|string $id): bool
    {
        $item = $this->model->onlyTrashed()->findOrFail($id);

        return $item->restore();
    }

    public function forceDelete(int $id): bool
    {
        $item = $this->model->onlyTrashed()->findOrFail($id);

        return $item->forceDelete();
    }

}
