<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
class ContactController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'contact';
    }
    public function index()
    {
        $contact = $this->database->getReference($this->tablename)->getValue();
        $total_contact = $reference = $this->database->getReference($this->tablename)->getSnapshot()->numChildren();
        return view('firebase.contact.index',compact('contact','total_contact'));

    }
    public function create(){
        return view('firebase.contact.create');
    }

    public function store(Request $request){
        
        $postData = [
            'fname' => $request ->first_name,
            'lname' => $request ->last_name,
            'phone' => $request ->phone,
            'email' => $request ->email,
        ];
        $postRef = $this->database->getReference( $this->tablename)->push($postData);
        if($postRef){
            return redirect('contact')->with('status','contact added succesful');
        }else{
            return redirect('contact')->with('status','contact added failed');
        }
    }
    public function edit($id){
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editdata){
        return view('firebase.contact.edit',compact('editdata','key'));
        }else{
            return redirect('contact')->with('status','contact ID Not Found');
        }
    }

    public function update(Request $request, $id){
        $key = $id;
        $updateData = [
            'fname' => $request ->first_name,
            'lname' => $request ->last_name,
            'phone' => $request ->phone,
            'email' => $request ->email,
        ];
        $res_update= $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if($res_update){
            return redirect('contact')->with('status','contact update succesful');
        }else{
            return redirect('contact')->with('status','contact update failed');
        }
    }
    public function destroy($id){
        $key = $id;
        $del_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if($del_data){
            return redirect('contact')->with('status','contact delete succesful');
        }else{
            return redirect('contact')->with('status','contact delete failed');
        }
    }
}