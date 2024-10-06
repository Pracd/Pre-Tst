<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DB::table('user')->join('film', 'user.id_user', '=', 'film.penonton')->get();
        return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = DB::table('user')->insertGetId([
            'nama' => $request->nama,
            'umur' => $request->umur,
        ]);

        DB::table('film')->insert([
            'judul' => $request->judul,
            'harga' => $request->harga,
            'penonton' => $id,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = DB::table('user')
            ->where('id_user', $id)
            ->join('film', 'user.id_user', '=', 'film.penonton')
            ->first(); // Ensure we get a single user record
    
        return view('edit', compact('user'));
         // Pass $user to the view
    }
        
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
            DB::table('user')
                ->where('id_user', $request->id)
                ->update([
                   'nama' => $request->nama,
                   'umur' => $request->umur, 
            ]);
    
            DB::table('film')
                ->where('penonton', $request->id)
                ->update([
                   'judul' => $request->judul,
                   'harga' => $request->harga, 
            ]);

            return redirect()->route('users.index')->with('success', 'Data user berhasil diupdate!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
            DB::table('user')->where('id_user', $id)->delete();
            return redirect('/');
    }
}
