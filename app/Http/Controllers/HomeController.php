<?php

namespace App\Http\Controllers;

use Virtuagym\Plan\PlanRepositoryInterface;

class HomeController extends Controller
{
    public function index(PlanRepositoryInterface $planRepository)
    {
        $plans = $planRepository->findAll();

        $users = [];

        return view('home', compact('plans', 'users'));
    }
}
