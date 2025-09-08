<?php
namespace App\Services\Implementations;

use App\Services\Contracts\BaseServiceInterface;
use App\Repositories\Contracts\BaseRepositoryInterface;

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

    public function store(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->repository->delete($id);
    }

    public function testBase()
    {
        $msg = $this->repository->testBase();
        return response()->json(['Service' => 'Base Service OK', 'Repository' => $msg], 200);
    }
}
