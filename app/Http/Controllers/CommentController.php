<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentController extends Controller
{
    // Méthode pour enregistrer un nouveau commentaire
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'texte' => 'required|string',
            'id_event' => 'required|exists:events,id',
        ]);

        $validatedData['id_user'] = auth()->id();

        Commentaire::create($validatedData);

        return back()->with('success', 'Commentaire ajouté avec succès.');
    }

    // Méthode pour supprimer un commentaire
    public function destroy($id)
    {
        $comment = Commentaire::findOrFail($id);

        // Vérifier si l'utilisateur peut supprimer ce commentaire (optionnel)
        if ($comment->id_user !== auth()->id()) {
            return back()->with('error', 'Vous n\'êtes pas autorisé à supprimer ce commentaire.');
        }

        $comment->delete();

        return back()->with('success', 'Commentaire supprimé avec succès.');
    }
}
