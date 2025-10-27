<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function __construct(private PlayerService $service)
    {
        //
    }
}
