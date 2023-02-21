<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animes = Anime::get();
        return response()->json([
            'data' => $animes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $anime = Anime::create([
            'title' => $request->title,
            'release_date' => $request->release_date,
            'total_eps' => $request->total_eps,
            'genre' => $request->genre,
            'id_number' => $request->id_number
        ]);
        return response()->json([
            'data' => $anime
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Anime $anime)
    {
        return response()->json([
            'data' => $anime
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anime $anime)
    {
        $anime->title = $request->title;
        $anime->release_date = $request->release_date;
        $anime->total_eps = $request->total_eps;
        $anime->genre = $request->genre;
        $anime->id_number = $request->id_number;
        $anime->save();

        return response()->json([
            'data' => $anime
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime $anime)
    {
        $anime->delete();
        return response()->json([
            'message' => 'anime deleted'
        ],204); 
    }
}
