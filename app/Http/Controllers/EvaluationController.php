<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;

class EvaluationController extends Controller
{
    /**
     * Store a newly created evaluation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des données de l'évaluation
        $validatedData = $request->validate([
            'id_event' => 'required|exists:events,id',
            'note' => 'required|integer|between:1,5',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        // Création de l'évaluation
        $evaluation = Evaluation::create([
            'id_event' => $validatedData['id_event'],
            'note' => $validatedData['note'],
            // Ajoutez d'autres champs d'évaluation au besoin
        ]);

        // Redirection ou réponse JSON selon votre besoin
        return redirect()->back()->with('success', 'Evaluation soumise avec succès.');
    }

    /**
     * Remove the specified evaluation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recherche de l'évaluation à supprimer
        $evaluation = Evaluation::findOrFail($id);

        // Suppression de l'évaluation
        $evaluation->delete();

        // Redirection ou réponse JSON selon votre besoin
        return redirect()->back()->with('success', 'Évaluation supprimée avec succès.');
    }
}
