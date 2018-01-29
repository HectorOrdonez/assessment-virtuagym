<?php

namespace App\Http\Controllers;

use Virtuagym\Plan\PlanRepositoryInterface;
use Virtuagym\User\UserRepositoryInterface;

class HomeController extends Controller
{
    public function index(
        PlanRepositoryInterface $planRepository,
        UserRepositoryInterface $userRepository)
    {
        $plans = $planRepository->findAll();
        $users = $userRepository->findAll();

        return view('home', compact('plans', 'users'));
    }
}
