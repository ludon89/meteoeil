<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $observations = Observation::latest()->get();

        return view('observations.index', [
            'observations' => $observations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('observations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userInput = $request->validate([
            'title' => 'bail|required|string|max:255',
            'picture' => 'bail|required|mimes:jpg,png|max:2048',
            'location' => 'bail|required|string|max:255',
            'date' => 'bail|required|date',
            'time' => 'bail|required|date_format:H:i',
            'departement' => 'bail|required|string|max:3',
            'weather' => 'bail|string|max:128',
            'temperature' => 'bail|integer|between:-40,50',
            'description' => 'bail|string|max:1024',
        ]);

        $userInput['picture'] = $request->picture->store('user-obs', 'public');
        $userInput['user_id'] = auth()->id();

        Observation::create($userInput);

        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Observation $observation)
    {
        $observation = Observation::with(['comments.user', 'user'])
            ->find($observation->id);

        return view('observations.show', compact('observation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Observation $observation)
    {
        $this->authorize('update', $observation);

        return view('observations.edit', [
            'observation' => $observation
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Observation $observation)
    {
        $this->authorize('update', $observation);

        $validation = [
            'title' => 'bail|required|string|max:255',
            'location' => 'bail|required|string|max:255',
            'departement' => 'bail|required|string|max:3',
            'weather' => 'bail|string|max:128',
            'temperature' => 'bail|integer|between:-40,50',
            'description' => 'bail|string|max:1024',
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
     * Remove the specified resource from storage.
     */
    public function destroy(Observation $observation)
    {
        //
    }
}
