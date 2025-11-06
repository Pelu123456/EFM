<?php
namespace App\Services\Contracts;
use Illuminate\Http\UploadedFile;

interface BaseServiceInterface
{
    public function getAll();

    public function getById(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
    
    public function restore(int|string $id): bool;
    
    public function forceDelete(int|string $id): bool;
    
    // public function testBase();

    public function prepareImage(UploadedFile $image, string $folder): array;

}
