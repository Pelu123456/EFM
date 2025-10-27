<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected $service;
      /**
     * List all resources
     */
    public function index(Request $request): JsonResponse
    {
        $data = $this->service->all($request->all());
        return response()->json($data);
    }

     /**
     * Show single resource
     */
    public function show(int $id): JsonResponse
    {
        $item = $this->service->find($id);
        return response()->json($item);
    }

    public function store(Request $request): JsonResponse
    {
        $item = $this->service->create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $item = $this->service->update($id, $request->all());
        return response()->json($item);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->delete($id);
        return response()->json(null, 204);
    }

    public function softDelete(int $id): JsonResponse
    {
        if (method_exists($this->service, 'softDelete')) {
            $this->service->softDelete($id);
            return response()->json(['message' => 'Soft deleted'], 200);
        }

        return response()->json(['message' => 'Soft delete not supported'], 400);
    }
}
