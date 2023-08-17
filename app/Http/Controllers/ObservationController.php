<?php

namespace App\Http\Controllers;

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
            'picture' => 'bail|mimes:jpg,png|max:2048',
            'location' => 'bail|required|string|max:255',
            'date' => 'bail|required|date',
            'time' => 'bail|required|date_format:H:i',
            'departement' => 'bail|required|integer',
            'weather' => 'bail|string|max:255',
            'temperature' => 'bail|integer',
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Observation $observation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Observation $observation)
    {
        //
    }
}
