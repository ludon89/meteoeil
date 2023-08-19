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
    public function adminDashboard(User $authUser)
    {
        if (!Gate::allows('access-admin', $authUser)) {
            abort(403);
        }

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
    public function destroyUser(User $user, $authUser)
    {
        if (!Gate::allows('access-admin', $authUser)) {
            abort(403);
        }

        dd($user);

        // $user = $request->user;
        Auth::logout($user);
        $user->delete;

        return redirect(route('admin.dashboard'));
    }
}
