<?php

namespace App\Http\Controllers;

use App\Models\ConnectionProaccounting;
use App\Models\Proaccounting\Journal;
use App\Models\Proaccounting\Setting;
use PDO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rules\Exists;

class ProaccountingController extends Controller
{
    public function index()
    {
        $proaccounting = ConnectionProaccounting::all();

        foreach ($proaccounting as $key => $value) {
            Config::set("database.connections.proaccounting", [
                "driver" => "mysql",
    
                # env
                "host" => $value['proaccounting_database_ip'],
                "port" => $value['proaccounting_database_port'],
                "database"=> $value['proaccounting_database_name'],
                "username" => $value['proaccounting_database_user'],
                "password" => $value['proaccounting_database_password'],
                
                # other
                'charset' => env('DB_CHARSET', 'utf8mb4'),
                'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
                'prefix' => '',
                'prefix_indexes' => true,
                'strict' => true,
                'engine' => null,
                'options' => extension_loaded('pdo_mysql') ? array_filter([
                    PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
                ]) : [],
            ]);
        }

        # get journal manual & prohukum
        $data_journal = Journal::select([
            'journal_date',
            'journal_type_id',
            DB::raw('COUNT(id) AS jumlah_journal')
        ])
            ->groupBy([
                'journal_date',
                'journal_type_id'
            ])
            ->orderBy('journal_date', 'asc')
            ->get();

        # generate new data
        $journal_manual = 0;
        $journal_prohukum = 0;

        foreach ($data_journal as $key => $value) {
            # manual journal
            if ($value->journal_type_id == 1) {
                $journal_manual += $value->jumlah_journal;
            } else {
                $journal_prohukum += $value->jumlah_journal;
            }
        }

        $total_journal_manual =  number_format($journal_manual, 0, ',', '.');
        $total_journal_prohukum =  number_format($journal_prohukum, 0, ',', '.');

        # get last date
        $last_date = Journal::select(['journal_date'])->max('journal_date'); 

        # get total journal
        $journal = Journal::select(['journal_date'])->count(); 
        $total_journal = number_format((float)$journal, 0, ',', '.');

        return view('proaccounting.home', compact('proaccounting', 'last_date', 'total_journal', 'total_journal_manual', 'total_journal_prohukum'));
    }

    public function switch_connection(Request $request)
    {
        $proaccounting = ConnectionProaccounting::where('client_code', $request->client_code)->firstOrFail();

        Session::put('proaccounting_connection', [
            'client_code' => $proaccounting->client_code,
            'client_name' => $proaccounting->client_name,
            'proaccounting_database_ip' => $proaccounting->proaccounting_database_ip,
            'proaccounting_database_port' => $proaccounting->proaccounting_database_port,
            'proaccounting_database_user' => $proaccounting->proaccounting_database_user,
            'proaccounting_database_password' => $proaccounting->proaccounting_database_password,
            'proaccounting_database_name' => $proaccounting->proaccounting_database_name
        ]);

        return redirect()->route('proaccounting.detail');
    }

    function detail(Request $request)
    {
        $thirtyDaysAgo = Carbon::now()->subDays(30)->toDateString(); //get 30 day

        # get data
        $data_journal = Journal::select([
            'journal_date',
            'journal_type_id',
            DB::raw('COUNT(id) AS jumlah_journal')
        ])
            ->where('journal_date', '>=', $thirtyDaysAgo)
            ->groupBy([
                'journal_date',
                'journal_type_id'
            ])
            ->orderBy('journal_date', 'asc')
            ->get();

        # generate new data
        $journal_manual = [];
        $journal_prohukum = [];

        foreach ($data_journal as $key => $value) {
            # manual journal
            if ($value->journal_type_id == 1) {
                $journal_manual[] = $value->jumlah_journal;
            } else {
                $journal_prohukum[] = $value->jumlah_journal;
            }
        }

        $categories = $data_journal->pluck('journal_date')->toArray(); // xAxis

        # get last date
        $last_date = Journal::select(['journal_date'])->where('journal_date', '>=', $thirtyDaysAgo)->max('journal_date'); 

        # get total journal
        $total_journal = Journal::select(['journal_date'])->where('journal_date', '>=', $thirtyDaysAgo)->count(); 

        # get total amount
        $jumlah_amount = Journal::join('journal_detail', 'journal.id', '=', 'journal_detail.journal_id')->where('journal_dk', '=', 1)->sum('journal_detail.journal_nominal'); 
        $total_amount = 'Rp ' . number_format($jumlah_amount, 2, ',', '.');

        # get client_name
        $client_name = Session::get('proaccounting_connection.client_name');

        return view('proaccounting.detail', compact('categories', 'total_journal', 'journal_manual', 'journal_prohukum', 'client_name', 'last_date', 'total_amount'));
    }

    public function edit()
    {
        $setting = Setting::all();
        return view('proaccounting.edit', compact('setting'));
    }    

    public function update(Request $request
    )
    {   
        $request->validate([
            'settings.*.value' => 'required',
        ]);
    
        foreach ($request->setting as $setting) {
            Setting::where('key', $setting['key'])->update([
                'value' => $setting['value'],
            ]);
        }
        return redirect()->route('proaccounting.edit')->with('success', 'Berhasil mengubah data!');
    }
}
