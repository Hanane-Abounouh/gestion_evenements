<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Afficher la liste des événements
    public function index()
    {
        $events = Event::all();
        return view('Home', compact('events'));
    }

    // Afficher le formulaire de création d'un nouvel événement
    public function create()
    {
        return view('events.create');
    }

    // Enregistrer un nouvel événement dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'nullable',
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i',
            'lieu' => 'required',
            'prix' => 'required',
            'id_user' => 'required|exists:users,id',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Événement créé avec succès.');
    }

    // Afficher les détails d'un événement spécifique
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.event-detail.', compact('event'));
    }

    // Afficher le formulaire de modification d'un événement existant
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    // Mettre à jour un événement existant dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'nullable',
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i',
            'lieu' => 'required',
            'prix' => 'required',
            'id_user' => 'required|exists:users,id',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Événement mis à jour avec succès.');
    }

    // Supprimer un événement existant de la base de données
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Événement supprimé avec succès.');
    }
}
