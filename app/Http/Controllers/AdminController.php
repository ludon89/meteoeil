<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Observation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard page with a listing of all the users.
     */
    public function adminDashboard()
    {
        $userListing = User::orderBy('id', 'desc')
            ->withCount('observations', 'comments')
            ->get();

        return view('admin.dashboard', [
            'users' => $userListing,
        ]);
    }

    /**
     * Delete the specified user.
     */
    public function destroyUser(User $user)
    {
        // dd($user);
        $user->delete();

        return redirect()->back();
    }
}
