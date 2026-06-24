<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        return view('dashboard', [
            'totalTasks' => $user->tasks()->count(),
            'pendingTasks' => $user->tasks()->pending()->count(),
            'completedTasks' => $user->tasks()->completed()->count(),
            'recentTasks' => $user->tasks()->latest()->take(5)->get(),
        ]);
    }
}