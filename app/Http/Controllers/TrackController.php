<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Track;
use Inertia\Inertia;
use Illuminate\Support\Str;

class TrackController extends Controller
{
        public function index()
        {
            $tracks = Track::where('display', true)->with('playlists')->orderBy('artist')->get();

            return Inertia::render('Track/Index', ['tracks' => $tracks]);
        }

        public function create(){
            return inertia::render('Track/Create');
        }

        public function store(Request $request){
            // dd('store');

            $request->validate([
                'artist' => ['required','string','max:255', 'min:2'],
                'title' => ['required','string','max:255','min:2'],
                'display' => ['required', 'boolean'],
                'poster' => ['required', 'image', 'max:10000'],
                'music' => ['required', 'file', 'mimes:mp3,wav', 'max:10000'],
            ]);


            $uuid = 'trk-' . Str::uuid();

            $imageExtension = $request->poster->extension();
            $imagePath = $request->poster->storeAs('tracks/images', $uuid . ".". $imageExtension);

            $musicExtension = $request->music->extension();
            $musicPath = $request->music->storeAs('tracks/musics', $uuid . ".". $musicExtension);

            Track::create([
                'uuid' => $uuid,
                'title' => $request->title,
                'artist' => $request->artist,
                'display' => $request->display,
                'poster' => $imagePath,
                'music' => $musicPath,
            ]);

            return redirect()->route('tracks.index');
        }
        
        public function show(string $id)
        {
            //
        }
    
        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Track $track)
        {
            return Inertia::render('Track/Edit', [
                'track' => $track,
            ]);
        }
    
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Track $track)
        {
            $request->validate([
                'title' => ['required', 'string', 'min:5', 'max:255'],
                'artist' => ['required', 'string', 'min:3', 'max:255'],
                'display' => ['required', 'boolean'],
            ]);
    
            $track->title = $request->title;
            $track->artist = $request->artist;
            $track->display = $request->display;
            $track->save();
    
            return redirect()->route('tracks.index');
        }
    
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Track $track)
        {
            $track->delete();
    
            return redirect()->route('tracks.index');
        }
}