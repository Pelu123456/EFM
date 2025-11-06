<?php

namespace App\Http\Controllers;
use App\Services\Implementations\BaseService;
abstract class Controller
{
    protected BaseService $service;

    public function __construct(BaseService $service)
    {
        $this->service = $service;
    }

    public function index(?\Illuminate\Http\Request $request = null)
    {
        return $this->service->getAll($request?->all() ?? []);
    }

    public function show(int $id)
    {
        return $this->service->getById($id);
    }

    public function delete(int $id)
    {
        return $this->service->delete($id);
    }

    public function restore($id)
    {
        $this->service->restore($id);

        return response()->json([
            'message' => 'Restored successfully',
        ]);
    }

    public function forceDelete($id)
    {
        $this->service->forceDelete($id);

        return response()->json([
            'message' => 'Permanently deleted successfully',
        ]);
    }

}
