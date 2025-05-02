<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $todayUsers = User::whereDate('created_at', Carbon::today())->count();
        $yesterdayUsers = User::whereDate('created_at', Carbon::yesterday())->count();
        $totalUsers = User::count();

        $change = 0;
        if ($yesterdayUsers > 0) {
            $change = (($todayUsers - $yesterdayUsers) / $yesterdayUsers) * 100;
        }
        return view('dashboard', compact('totalUsers', 'todayUsers', 'change'));

    }
}

