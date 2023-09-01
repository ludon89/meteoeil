<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Observation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ObservationController extends Controller
{
    /**
     * Affiche toutes les observations
     */
    public function index()
    {
        $observations = Observation::latest()->get();

        return view('observations.index', [
            'observations' => $observations,
        ]);
    }

    /**
     * Affiche le dashboard utilisateur avec ses observations
     */
    public function indexDashboard()
    {
        $userObservations = Auth::user()->observations()->latest()->get();

        return view('profile.dashboard', [
            'observations' => $userObservations,
        ]);
    }

    /**
     * Affiche la page de création d'une observation
     */
    public function create()
    {
        return view('observations.create');
    }

    /**
     * Crée une nouvelle observation dans la BDD
     */
    public function store(Request $request)
    {
        $departementCodes = array_keys(config('departements'));
        $weatherOptions = config('weather');

        $userInput = $request->validate([
            'title' => 'bail|required|string|max:128',
            'picture' => 'bail|required|mimes:jpg,jpeg,png|max:2048',
            'location' => 'bail|required|string|max:128',
            'date' => 'bail|required|date|before_or_equal:today',
            'time' => 'bail|required|date_format:H:i',
            'departement' => ['bail', 'required', 'string', 'in:' . implode(',', $departementCodes)],
            'weather' => ['bail', 'string', 'in:' . implode(',', $weatherOptions)],
            'temperature' => 'bail|nullable|integer|between:-40,50',
            'description' => 'bail|nullable|string|max:512',
        ]);

        $userInput['picture'] = $request->picture->store('user-obs', 'public');

        $observation = new Observation($userInput);
        $observation->user_id = Auth::id();
        $observation->save();

        return redirect(route('index'));
    }

    /**
     * Affiche une observation avec ses commentaires
     */
    public function show(Observation $observation)
    {
        $observation = Observation::with(['comments.user', 'user'])
            ->find($observation->id);

        return view('observations.show', compact('observation'));
    }

    /**
     * Affiche la page de modification d'une observation
     */
    public function edit(Observation $observation)
    {
        $this->authorize('update', $observation);

        return view('observations.edit', [
            'observation' => $observation
        ]);
    }

    /**
     * Met à jour l'observation dans la BDD
     */
    public function update(Request $request, Observation $observation)
    {
        $this->authorize('update', $observation);

        $departementCodes = array_keys(config('departements'));
        $weatherOptions = config('weather');

        $validation = [
            'title' => 'bail|required|string|max:128',
            'location' => 'bail|required|string|max:128',
            'date' => 'bail|required|date|before_or_equal:today',
            'time' => 'bail|required',
            'departement' => ['bail', 'required', 'string', 'in:' . implode(',', $departementCodes)],
            'weather' => ['bail', 'string', 'in:' . implode(',', $weatherOptions)],
            'temperature' => 'bail|nullable|integer|between:-40,50',
            'description' => 'bail|nullable|string|max:512',
        ];

        $this->validate($request, $validation);

        $observation->update([
            'title' => $request->title,
            'location' => $request->location,
            'date' => $request->date,
            'time' => $request->time,
            'departement' => $request->departement,
            'weather' => $request->weather,
            'temperature' => $request->temperature,
            'description' => $request->description,
        ]);

        return redirect(route('observations.show', $observation));
    }

    /**
     * Supprime l'observation de la BDD
     */
    public function destroy(Observation $observation)
    {
        $this->authorize('delete', $observation);

        Storage::disk('public')->delete($observation->picture);
        $observation->delete();

        return redirect(route('index'));
    }
}
