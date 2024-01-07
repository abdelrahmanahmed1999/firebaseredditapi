<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Toastr;



class contactController extends Controller
{

    public function __construct(Database $database){
        $this->database=$database;
        $this->tablename="contacts";
    }

    public function index(){
        $contacts=$this->database->getReference($this->tablename)->getValue();
        //return $contacts;

        return view('contacts',compact('contacts'));

    }

    public function add(){
        return view('add-contact');
    }

    public function store(Request $request){
        $postData=[
            'name'=>$request->name,
            'age'=>$request->age
        ];

        $postref=$this->database->getReference($this->tablename)->push($postData);

        if($postref){
            Toastr::success('Contact Addedd Successfully!');
            return redirect()->route('contacts');
        }
        else{
            Toastr::error('Contact Failed!');
            return redirect()->route('contacts');
        }
    }
}
