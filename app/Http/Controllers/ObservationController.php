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
     * Display a listing of the observation.
     */
    public function index()
    {
        $observations = Observation::latest()->get();

        return view('observations.index', [
            'observations' => $observations,
        ]);
    }

    /**
     * Display current user's dashboard with their observations.
     */
    public function indexDashboard()
    {
        $userObservations = Auth::user()->observations()->latest()->get();

        return view('dashboard', [
            'observations' => $userObservations,
        ]);
    }

    /**
     * Show the form for creating a new observation.
     */
    public function create()
    {
        return view('observations.create');
    }

    /**
     * Store a newly created observation in storage.
     */
    public function store(Request $request)
    {
        $userInput = $request->validate([
            'title' => 'bail|required|string|max:128',
            'picture' => 'bail|required|mimes:jpg,jpeg,png|max:2048',
            'location' => 'bail|required|string|max:128',
            'date' => 'bail|required|date',
            'time' => 'bail|required|date_format:H:i',
            'departement' => 'bail|required|string|max:3',
            'weather' => 'bail|string|max:64',
            'temperature' => 'bail|integer|between:-40,50',
            'description' => 'bail|string|max:512|nullable',
        ]);

        $userInput['picture'] = $request->picture->store('user-obs', 'public');
        $userInput['user_id'] = auth()->id();

        Observation::create($userInput);

        return redirect(route('index'));
    }

    /**
     * Display the specified observation with its associated comments.
     */
    public function show(Observation $observation)
    {
        $observation = Observation::with(['comments.user', 'user'])
            ->find($observation->id);

        return view('observations.show', compact('observation'));
    }

    /**
     * Show the form for editing the specified observation.
     */
    public function edit(Observation $observation)
    {
        $this->authorize('update', $observation);

        return view('observations.edit', [
            'observation' => $observation
        ]);
    }

    /**
     * Update the specified observation in storage.
     */
    public function update(Request $request, Observation $observation)
    {
        $this->authorize('update', $observation);

        $validation = [
            'title' => 'bail|required|string|max:128',
            'location' => 'bail|required|string|max:128',
            'departement' => 'bail|required|string|max:3',
            'weather' => 'bail|string|max:64',
            'temperature' => 'bail|integer|between:-40,50',
            'description' => 'bail|string|max:512|nullable',
        ];

        $this->validate($request, $validation);

        $observation->update([
            'title' => $request->title,
            'location' => $request->location,
            'departement' => $request->departement,
            'weather' => $request->weather,
            'temperature' => $request->temperature,
            'description' => $request->description,
        ]);

        return redirect(route('observations.show', $observation));
    }

    /**
     * Remove the specified observation from storage.
     */
    public function destroy(Observation $observation)
    {
        $this->authorize('delete', $observation);

        Storage::disk('public')->delete($observation->picture);
        $observation->delete();

        return redirect(route('index'));
    }
}
