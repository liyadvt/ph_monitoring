<?php

namespace App\Http\Controllers;

use App\Models\Main\Documentation;
use App\Models\Connection;
use App\Repositories\DocumentRepository;
use Illuminate\Http\Request;
use PDO;
use Illuminate\Support\Facades\Config;

class DocumentationProaccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $documentation = Documentation::all();
        //$documentation = (new DocumentRepository())->listing($request);

        return view('documentation.home', compact('documentation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $select = Connection::select(['client_code'])->get();
        return view('documentation.create', compact('select'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'documentation_request_date' => 'required',
            'documentation_title' => 'required',
            'documentation_description' => 'required',
        ]);

        Documentation::create([
            'client_id' =>$request->client_id,
            'documentation_request_date' =>$request->documentation_request_date,
            'documentation_title' =>$request->documentation_title,
            'documentation_description' =>$request->documentation_description,
        ]);

        return redirect()->route('documentation.home')->with('success', 'Data berhasil di tambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $documentation = Documentation::find($id);
        return view('documentation.index', compact('documentation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $select = Connection::select(['client_code'])->get();
        $documentation = Documentation::find($id);
        return view('documentation.edit', compact('documentation', 'select'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'client_id' => 'required',
            'documentation_request_date' => 'required',
            'documentation_title' => 'required',
            'documentation_description' => 'required',
        ]);

        Documentation::where('id', $id)->update([
            'client_id' =>$request->client_id,
            'documentation_request_date' =>$request->documentation_request_date,
            'documentation_title' =>$request->documentation_title,
            'documentation_description' =>$request->documentation_description,
        ]);
        
        return redirect()->route('documentation.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Documentation::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data !');
    }
}
