<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PlayerRequest;
use App\Services\Implementations\PlayerService;

class PlayerController extends Controller
{
    protected PlayerService $playerService;
    public function __construct(PlayerService $playerService)
    {
        $this->playerService = $playerService;
        parent::__construct($playerService);
    }

     public function store(PlayerRequest $request)
    {
        $validatedData = $request->validated();
        return $this->playerService->create($validatedData);
    }

    public function update(PlayerRequest $request, $id)
    {
        $validatedData = $request->validated();
        
        return $this->playerService->update($id, $validatedData);
    }
}
