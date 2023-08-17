<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userInput = $request->validate([
            'content' => 'bail|required|string|max:512',
        ]);

        $userInput['user_id'] = auth()->id();
        $userInput['observation_id'] = $request->observation;

        Comment::create($userInput);

        return redirect(route('observations.show', $request->observation));
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);

        return view('comments.edit', [
            'comment' => $comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $userInput = $request->validate([
            'content' => 'bail|required|string|max:512',
        ]);

        $comment->update([
            'content' => $userInput['content'],
        ]);

        return redirect(route('observations.show', $comment->observation));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
