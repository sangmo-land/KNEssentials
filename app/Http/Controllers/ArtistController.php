<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $tracks = Track::with(['album.artist'])
            ->orderBy('album_id')
            ->orderBy('track_number')
            ->paginate(20);

        return view('tracks.index', compact('tracks'));
    }

    public function create()
    {
        $albums = Album::with('artist')->orderBy('title')->get();
        return view('tracks.create', compact('albums'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'album_id' => 'required|exists:albums,id',
            'duration' => 'required|integer|min:30',
            'track_number' => 'required|integer|min:1'
        ]);

        Track::create($validated);

        return redirect()->route('tracks.index')
            ->with('success', 'Track created successfully');
    }

    public function show(Track $track)
    {
        $track->load(['album.artist']);
        return view('tracks.show', compact('track'));
    }

    public function edit(Track $track)
    {
        $albums = Album::with('artist')->orderBy('title')->get();
        return view('tracks.edit', compact('track', 'albums'));
    }

    public function update(Request $request, Track $track)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'album_id' => 'required|exists:albums,id',
            'duration' => 'required|integer|min:30',
            'track_number' => 'required|integer|min:1'
        ]);

        $track->update($validated);

        return redirect()->route('tracks.show', $track)
            ->with('success', 'Track updated successfully');
    }

    public function destroy(Track $track)
    {
        $track->delete();
        return redirect()->route('tracks.index')
            ->with('success', 'Track deleted successfully');
    }
}