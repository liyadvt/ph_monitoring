<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $connection = Connection::all();
        return view('connection.home', compact('connection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('connection.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_code' => 'required',
            'client_name' => 'required',
            
             // prohukum
            'prohukum_database_ip' => 'required',
            'prohukum_database_port' => 'required',
            'prohukum_database_user' => 'required',
            'prohukum_database_password' => 'required',
            'prohukum_database_name' => 'required',

            // proaccounting
            'proaccounting_database_ip' => 'nullable',
            'proaccounting_database_port' => 'nullable',
            'proaccounting_database_user' => 'nullable',
            'proaccounting_database_password' => 'nullable',
            'proaccounting_database_name' => 'nullable',
        ]);

        Connection::create([
            'client_code' =>$request->client_code,
            'client_name' =>$request->client_name,

            //prohukum
            'prohukum_database_ip' =>$request->prohukum_database_ip,
            'prohukum_database_port' =>$request->prohukum_database_port,
            'prohukum_database_user' =>$request->prohukum_database_user,
            'prohukum_database_password' =>$request->prohukum_database_password,
            'prohukum_database_name' =>$request->prohukum_database_name,

            //proaccounting
            'proaccounting_database_ip' =>$request->proaccounting_database_ip,
            'proaccounting_database_port' =>$request->proaccounting_database_port,
            'proaccounting_database_user' =>$request->proaccounting_database_user,
            'proaccounting_database_password' =>$request->proaccounting_database_password,
            'proaccounting_database_name' =>$request->proaccounting_database_name,
        ]);

        return redirect()->route('connection.home')->with('success', 'Data berhasil di tambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $connection = Connection::find($id);
        return view('connection.index', compact('connection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $connection = Connection::find($id);
        return view('connection.edit', compact('connection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'client_code' => 'required',
            'client_name' => 'required',            
            
             // prohukum
            'prohukum_database_ip' => 'required',
            'prohukum_database_port' => 'required',
            'prohukum_database_user' => 'required',
            'prohukum_database_password' => 'required',
            'prohukum_database_name' => 'required',

            // proaccounting
            'proaccounting_database_ip' => 'nullable',
            'proaccounting_database_port' => 'nullable',
            'proaccounting_database_user' => 'nullable',
            'proaccounting_database_password' => 'nullable',
            'proaccounting_database_name' => 'nullable',
        ]);

        Connection::where('id', $id)->update([
            'client_code' =>$request->client_code,
            'client_name' =>$request->client_name,

            //prohukum
            'prohukum_database_ip' =>$request->prohukum_database_ip,
            'prohukum_database_port' =>$request->prohukum_database_port,
            'prohukum_database_user' =>$request->prohukum_database_user,
            'prohukum_database_password' =>$request->prohukum_database_password,
            'prohukum_database_name' =>$request->prohukum_database_name,

            //proaccounting
            'proaccounting_database_ip' =>$request->proaccounting_database_ip,
            'proaccounting_database_port' =>$request->proaccounting_database_port,
            'proaccounting_database_user' =>$request->proaccounting_database_user,
            'proaccounting_database_password' =>$request->proaccounting_database_password,
            'proaccounting_database_name' =>$request->proaccounting_database_name,
        ]);
        
        return redirect()->route('connection.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Connection::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data !');
    }
}
