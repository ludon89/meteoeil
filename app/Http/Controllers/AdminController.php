<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Observation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard page with a listing of all the users.
     */
    public function adminDashboard(User $user)
    {
        if (!Gate::allows('access-admin', $user)) {
            abort(403);
        }

        $userListing = User::orderBy('id', 'desc')->get();

        return view('admin.dashboard', [
            'users' => $userListing,
        ]);
    }
}
