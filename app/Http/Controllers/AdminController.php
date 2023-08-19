<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Observation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function adminDashboard(User $user)
    {
        if (!Gate::allows('access-admin', $user)) {
            abort(403);
        }

        return view("admin.dashboard");
    }
}
