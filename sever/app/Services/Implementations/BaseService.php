<?php
namespace App\Services\Implementations;

use App\Services\Contracts\BaseServiceInterface;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class BaseService implements BaseServiceInterface
{
    protected BaseRepositoryInterface $repository;

    public function __construct(BaseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function getById(int $id)
    {
        return $this->repository->find($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    public function testBase()
    {
        $msg = $this->repository->testBase();
        return response()->json(['Service' => 'Base Service OK', 'Repository' => $msg], 200);
    }

    protected function beforeStore(array $data): array { return $data; }
    protected function afterStore($model, array $data): void {}
    protected function beforeUpdate(int $id, array $data): array { return $data; }
    protected function afterUpdate($model, array $data): void {}


    public function prepareImage(UploadedFile $image, string $folder): array
    {
        $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
        
        return [
            'file' => $image,
            'file_name' => $fileName,
            'folder' => $folder
        ];
    }

    public function restore(int|string $id): bool
    {
        return $this->repository->restore($id);
    }

    public function forceDelete(int|string $id): bool
    {
        return $this->repository->forceDelete($id);
    }
    
}
