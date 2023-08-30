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
     * Affiche le dashboard admin avec un listing de tous les utilisateurs inscrits
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
     * Supprime l'utilisateur de la BDD
     */
    public function destroyUser(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
