<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Implementations\OrganizationService;
use App\Http\Requests\OrganizationRequest;

class OrganizationController extends Controller
{
    protected OrganizationService $OrganizationService;

    public function __construct(OrganizationService $OrganizationService)
    {
        $this->OrganizationService = $OrganizationService;
        parent::__construct($OrganizationService);
    }

    public function store(OrganizationRequest $request)
    {
        $validatedData = $request->validated();
        return $this->OrganizationService->create($validatedData);
    }

    public function update(OrganizationRequest $request, $id)
    {
        $validatedData = $request->validated();
        
        return $this->OrganizationService->update($id, $validatedData);
    }
}
