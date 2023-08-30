<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Crée un nouveau commentaire dans la BDD
     */
    public function store(Request $request)
    {
        $userInput = $request->validate([
            'content' => 'bail|required|string|max:512',
        ]);

        $comment = new Comment($userInput);
        $comment->user_id = Auth::id();
        $comment->observation_id = $request->observation;

        $comment->save();

        return redirect(route('observations.show', $request->observation));
    }

    /**
     * Affiche la page de modification d'un commentaire
     */
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);

        return view('comments.edit', [
            'comment' => $comment
        ]);
    }

    /**
     * Met à jour le commentaire dans la BDD
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
     * Supprime le commentaire de la BDD
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect(route('observations.show', $comment->observation));
    }
}
