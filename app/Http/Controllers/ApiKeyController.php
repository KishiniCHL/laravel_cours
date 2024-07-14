<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApiKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = auth()->user();
    $apiKeys = $user->apiKeys()->latest()->get();
    return Inertia::render('API/Index', [
        'userApiKeys' => $apiKeys, 
    ]);
}
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('API/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $apiKey = ApiKey::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'key' => bin2hex(random_bytes(20)), 
        ]);
        
        return redirect()->route('api-keys.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApiKey $apiKey)
    {
        $apiKey->delete();

        return redirect()->route('api-keys.index');
    }
}
