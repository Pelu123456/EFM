<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use App\Services\Implementations\TeamService;

class TeamController extends Controller
{
    protected $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
        parent::__construct($teamService);
    }
    public function getByOrganizationId($id)
    {
        return $this->teamService->getByOrganizationId($id);
    }

     public function store(TeamRequest $request)
    {
        $validatedData = $request->validated();
        return $this->teamService->create($validatedData);
    }

    public function update(TeamRequest $request, $id)
    {
        $validatedData = $request->validated();
        
        return $this->teamService->update($id, $validatedData);
    }
}
