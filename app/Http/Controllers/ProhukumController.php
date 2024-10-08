<?php

namespace App\Http\Controllers;

use App\Models\ConnectionProhukum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Exists;

class ProhukumController extends Controller
{
    public function index()
    {
        $prohukum = ConnectionProhukum::all();
        return view('prohukum.home', compact('prohukum'));
    }

    public function switch_connection(Request $request)
    {
        $prohukum = ConnectionProhukum::where('client_code', $request->client_code)->firstOrFail();

        Session::put('prohukum_connection', [
            'client_code' => $prohukum->client_code,
            'client_name' => $prohukum->client_name,
            'prohukum_database_ip' => $prohukum->prohukum_database_ip,
            'prohukum_database_port' => $prohukum->prohukum_database_port,
            'prohukum_database_user' => $prohukum->prohukum_database_user,
            'prohukum_database_password' => $prohukum->prohukum_database_password,
            'prohukum_database_name' => $prohukum->prohukum_database_name
        ]);

        return redirect()->route('prohukum.detail');
    }

    function detail(Request $request)
    {
        $client_name = Session::get('prohukum_connection.client_name');

        return view('prohukum.detail', compact('client_name'));
    }

}
