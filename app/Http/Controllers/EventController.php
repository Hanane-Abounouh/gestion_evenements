<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Inscription;
use App\Models\Commentaire;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all(); // Récupérer tous les événements
        return view('home', compact('events')); // Passer les événements à la vue
    }

    public function myEvents()
    {
        $events = auth()->user()->events()->paginate(10); // Récupérer les événements de l'utilisateur authentifié
        return view('events.myevents', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i',
            'lieu' => 'required|string|max:255',
            'prix' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = new Event([
            'titre' => $validatedData['titre'],
            'description' => $validatedData['description'],
            'date' => $validatedData['date'],
            'heure' => $validatedData['heure'],
            'lieu' => $validatedData['lieu'],
            'prix' => $validatedData['prix'],
            'id_user' => Auth::id(),
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imagePath = str_replace('public/', '', $imagePath);
            $event->image = $imagePath;
        }

        $event->save();

        return redirect()->route('home')->with('success', 'Event created successfully.');
    }

    public function show($id)
    {
        $event = Event::with('comments.user', 'evaluations.user')->findOrFail($id);
        return view('events.event-detail', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i',
            'lieu' => 'required|string|max:255',
            'prix' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::delete('public/' . $event->image);
            }
            $validatedData['image'] = $request->file('image')->store('public/images');
            $validatedData['image'] = str_replace('public/', '', $validatedData['image']);
        }

        $event->update($validatedData);

        return redirect()->route('events.myevents')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.myevents')->with('success', 'Event deleted successfully.');
    }

    public function buyTicket(Event $event)
    {
        $user = auth()->user();

        if ($event->inscriptions()->where('id_user', $user->id)->exists()) {
            return back()->with('error', 'Vous avez déjà acheté un billet pour cet événement.');
        }

        Inscription::create([
            'id_user' => $user->id,
            'id_event' => $event->id,
        ]);

        return back()->with('success', 'Billet acheté avec succès.');
    }

    public function deleteTicket(Event $event)
    {
        $user = auth()->user();

        $inscription = $event->inscriptions()->where('id_user', $user->id)->first();

        if (!$inscription) {
            return back()->with('error', 'Vous n\'avez pas de billet pour cet événement.');
        }

        $inscription->delete();

        return back()->with('success', 'Billet supprimé avec succès.');
    }

    public function storeEvaluation(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'note' => 'required|integer|min:1|max:5',
            'commentaire' => 'nullable|string',
        ]);

        Evaluation::create([
            'note' => $validatedData['note'],
            'commentaire' => $validatedData['commentaire'],
            'id_user' => Auth::id(),
            'id_event' => $event->id,
        ]);

        return back()->with('success', 'Évaluation ajoutée avec succès.');
    }
}

