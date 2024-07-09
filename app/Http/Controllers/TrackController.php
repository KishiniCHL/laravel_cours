<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Track;
use Inertia\Inertia;

class TrackController extends Controller
{
        public function index()
        {
            $tracks = Track::where('display', true)->orderBy('artist')->get();

            return Inertia::render('Track/Index', ['tracks' => $tracks]);
        }
}