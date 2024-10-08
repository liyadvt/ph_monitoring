<?php

namespace App\Repositories;

use  App\Models\Main\Documentation;
use Illuminate\Http\Request;

class DocumentRepository{
    public function listing(Request $request){
        $query = Documentation::select("*");

        if($request->keyword){
            $query->where("documentation.documentation_title", "LIKE",  "'%$request->keyword%'");
        }

        return $query->get();
    }
}