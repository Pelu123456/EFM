<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Implementations\PositionService;
use App\Http\Requests\PositionRequest;

class PositionController extends Controller
{
    protected PositionService $positionService;
    public function __construct(PositionService $positionService)
    {
        $this->positionService = $positionService;
        parent::__construct($positionService);
    }

        public function store(PositionRequest $request)
    {
        $validatedData = $request->validated();
        return $this->positionService->create($validatedData);
    }

    public function update(PositionRequest $request, $id)
    {
        $validatedData = $request->validated();
        
        return $this->positionService->update($id, $validatedData);
    }
}
