<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with(['artist'])
            ->orderBy('title')
            ->paginate(20);

        return view('albums.index', compact('albums'));
    }

    public function create()
    {
        $artists = Artist::orderBy('name')->get();
        return view('albums.create', compact('artists'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist_id' => 'required|exists:artists,id',
            'release_date' => 'required|date',
            'cover_art' => 'nullable|image|max:2048' // 2MB max
        ]);

        // Handle file upload
        if ($request->hasFile('cover_art')) {
            $validated['cover_art'] = $request->file('cover_art')->store('albums/cover_art', 'public');
        }

        Album::create($validated);

        return redirect()->route('albums.index')
            ->with('success', 'Album created successfully');
    }

    public function show(Album $album)
    {
        $album->load(['artist', 'tracks']);
        return view('albums.show', compact('album'));
    }

    public function edit(Album $album)
    {
        $artists = Artist::orderBy('first_name')->get();
        return view('albums.edit', compact('album', 'artists'));
    }

    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist_id' => 'required|exists:artists,id',
            'release_date' => 'required|date',
            'cover_art' => 'nullable|image|max:2048'
        ]);

        // Handle file upload
        if ($request->hasFile('cover_art')) {
            // Delete old cover art if exists
            if ($album->cover_art) {
                Storage::disk('public')->delete($album->cover_art);
            }
            $validated['cover_art'] = $request->file('cover_art')->store('albums/cover_art', 'public');
        } else {
            // Keep existing cover art if not updated
            $validated['cover_art'] = $album->cover_art;
        }

        $album->update($validated);

        return redirect()->route('albums.show', $album)
            ->with('success', 'Album updated successfully');
    }

    public function destroy(Album $album)
    {
        // Delete associated cover art
        if ($album->cover_art) {
            Storage::disk('public')->delete($album->cover_art);
        }
        
        $album->delete();
        return redirect()->route('albums.index')
            ->with('success', 'Album deleted successfully');
    }
}