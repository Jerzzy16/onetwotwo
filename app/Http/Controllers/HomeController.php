<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airingMovie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlZjAyMWU1ZDQwMmVkZjI0MDNjYWJiYjdmZWI4ZjUyYyIsIm5iZiI6MTczMzYyMjcxMC44Niwic3ViIjoiNjc1NGZiYjY2ZTBiZWQyNjZiN2Y2ZWMzIiwic2NvcGVzIjpbImFwaV9yZWFkIl0sInZlcnNpb24iOjF9.3Z3IBt6oto1R2dVYvBZp4qcITMvP2Tfui19GAKnMfoY')
            ->get('https://api.themoviedb.org/3/tv/airing_today')
            ->json()['results'];
        $npMovie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlZjAyMWU1ZDQwMmVkZjI0MDNjYWJiYjdmZWI4ZjUyYyIsIm5iZiI6MTczMzYyMjcxMC44Niwic3ViIjoiNjc1NGZiYjY2ZTBiZWQyNjZiN2Y2ZWMzIiwic2NvcGVzIjpbImFwaV9yZWFkIl0sInZlcnNpb24iOjF9.3Z3IBt6oto1R2dVYvBZp4qcITMvP2Tfui19GAKnMfoY')
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];
        $topMovie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlZjAyMWU1ZDQwMmVkZjI0MDNjYWJiYjdmZWI4ZjUyYyIsIm5iZiI6MTczMzYyMjcxMC44Niwic3ViIjoiNjc1NGZiYjY2ZTBiZWQyNjZiN2Y2ZWMzIiwic2NvcGVzIjpbImFwaV9yZWFkIl0sInZlcnNpb24iOjF9.3Z3IBt6oto1R2dVYvBZp4qcITMvP2Tfui19GAKnMfoY')
            ->get('https://api.themoviedb.org/3/movie/top_rated')
            ->json()['results'];


        return view('home', [
            'airMovie' => $airingMovie,
            'npMovie' => $npMovie,
            'topMovie' => $topMovie,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
