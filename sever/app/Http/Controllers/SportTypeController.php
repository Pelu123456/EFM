<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Implementations\SportTypeService;
use App\Http\Requests\SportTypeRequest;

class SportTypeController extends Controller
{
    protected $sportTypeService;

    public function __construct(SportTypeService $sportTypeService)
    {
        $this->sportTypeService = $sportTypeService; 
        parent::__construct($sportTypeService);
    }

    public function store(SportTypeRequest $request)
    {
        $validatedData = $request->validated();
        return $this->sportTypeService->create($validatedData);
    }

    public function update(SportTypeRequest $request, $id)
    {
        $validatedData = $request->validated();
        
        return $this->sportTypeService->update($id, $validatedData);
    }
}
