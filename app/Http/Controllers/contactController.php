<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;


class contactController extends Controller
{

    public function __construct(Database $database){
        $this->database=$database;
        $this->tablename="contacts";
    }

    public function index(){
        $contacts=$this->database->getReference($this->tablename)->getValue();
        return view('contacts',compact('contacts'));

    }

    public function store(Request $request){
        $postData=[
            'name'=>'mohamed',
            'age'=>26
        ];

        $postref=$this->database->getReference($this->tablename)->push($postData);

        if($postref){
            return response()->json([
                'status' => 'added'
            ]);
        }
        else{
            return response()->json([
                'status' => 'not added'
            ]);
        }
    }
}
