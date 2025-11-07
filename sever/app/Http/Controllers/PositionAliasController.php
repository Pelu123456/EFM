<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PositionAliasRequest;
use App\Services\Implementations\PositionAliasService;

class PositionAliasController extends Controller
{
    protected PositionAliasService $positionAliasService;

    public function __construct(PositionAliasService $positionAliasService)
    {
        $this->positionAliasService = $positionAliasService;
        parent::__construct($positionAliasService);
    }

    public function store(PositionAliasRequest $request)
    {
        $validatedData = $request->validated();
        return $this->positionAliasService->create($validatedData);
    }

    public function update(PositionAliasRequest $request, $id)
    {
        $validatedData = $request->validated();
        
        return $this->positionAliasService->update($id, $validatedData);
    }
}
