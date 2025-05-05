<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livestream;
use Illuminate\Support\Facades\Auth;

class LivestreamController extends Controller
{
    public function index()
    {
        $livestreams = Livestream::where('status', 'active')->latest()->get();
        return view('livestreams.index', compact('livestreams'));
    }

    public function create()
    {
        return view('livestreams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'embed_url' => 'required|url',
        ]);

        Livestream::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'embed_url' => $request->embed_url,
            'status' => 'active',
        ]);

        return redirect()->route('livestreams.index')->with('success', 'You are live!');
    }

    public function show(Livestream $livestream)
    {
        return view('livestreams.show', compact('livestream'));
    }

    public function deactivate(Livestream $livestream)
    {
        $livestream->update(['status' => 'inactive']);
        return redirect()->route('livestreams.index')->with('success', 'Livestream ended.');
    }
}
