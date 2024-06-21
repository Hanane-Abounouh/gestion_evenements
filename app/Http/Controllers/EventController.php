<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('Home', compact('events'));
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

      // Gestion de l'image si elle est présente dans la requête
          if ($request->hasFile('image')) {
          $imagePath = $request->file('image')->store('public/images');
          // Récupérer le chemin complet du fichier sauvegardé
          $imagePath = str_replace('public/', '', $imagePath); // ajustement du chemin pour le stockage:link
          $event->image = $imagePath;
}


        $event->save();

        return redirect()->route('Home')->with('success', 'Event created successfully.');
    }

    public function show(Event $event)
    {
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
            'description' => 'nullable|string',
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i',
            'lieu' => 'required|string|max:255',
            'prix' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        } else {
            $imagePath = $event->image;
        }

        $event->update([
            'titre' => $validatedData['titre'],
            'description' => $validatedData['description'],
            'date' => $validatedData['date'],
            'heure' => $validatedData['heure'],
            'lieu' => $validatedData['lieu'],
            'prix' => $validatedData['prix'],
            'image' => $imagePath,
            'id_user' => Auth::id(),
        ]);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
