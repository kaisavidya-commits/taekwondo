<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')
                         ->with('success','Event berhasil ditambahkan');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')
                         ->with('success','Event berhasil diupdate');
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();

        return redirect()->route('events.index')
                         ->with('success','Event berhasil dihapus');
    }
}