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
        $totalcontact=$this->database->getReference($this->tablename)->getSnapshot()->numChildren();

        return view('contacts',compact('contacts','totalcontact'));

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

    public function edit($key){
        $editdata=$this->database->getReference($this->tablename)->getChild($key)->getValue();
        if( $editdata){
            return view('edit-contact',compact('editdata','key'));
        }
        else{
            Toastr::error('Contact Not Found!');
            return redirect()->route('contacts');
        }

    }

    public function update(Request $request){
        $postData=[
            'name'=>$request->name,
            'age'=>$request->age
        ];

        $postref=$this->database->getReference($this->tablename.'/'.$request->key)->update($postData);

        if($postref){
            Toastr::success('Contact Updated Successfully!');
            return redirect()->route('contacts');
        }
        else{
            Toastr::error('Contact Failed!');
            return redirect()->route('contacts');
        }
    }


    public function delete(Request $request){
        $deletedata=  $this->database->getReference($this->tablename.'/'.$request->key)->remove();
        if( $deletedata){
            Toastr::success('Contact Deleted Successfully!');
        }
        else{
            Toastr::error('Contact Failed!');
        }

    }
}
