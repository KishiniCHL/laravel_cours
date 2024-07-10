<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;


class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = Playlist::all();

        return Inertia::render('Playlist/Index', [
            'playlists' => $playlists,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'min:2'],
        ]);

        dd($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        //
    }
}
