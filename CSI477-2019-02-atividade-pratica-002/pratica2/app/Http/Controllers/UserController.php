<?php

namespace App\Http\Controllers;

use App\subjects;
use App\requests;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewProtocol(){
        $requests = Subjects::join('requests','requests.subject_id','=','subjects.id')
            ->where('user_id',auth()->user()->id)
            ->orderBy('date')->get();
            
        $subjects = Subjects::orderBy('name')->get();
        return view('meusProtocolos',compact('requests'), compact('subjects'));
    }

    public function createRequest(){    
        $subjects = Subjects::orderBy('name')->get();
        return view("formulario",compact('subjects'));
     }

    public function store(){
        $request = new Requests;
        $request->subject_id = request("protocolo");
        $request->description = request("descricao");
        $request->date = request("data");
        $request->user_id = auth()->user()->id;
        $request->save();
        return redirect("/home");

    }

    public function destroy($id){
        $requestObj = Requests::findOrFail($id);
        $requestObj->delete();
    return redirect('/home');

    }

    public function update(Request $rq, $id){
        $newRequest = Requests::findOrFail($id);
        $newRequest->subject_id = $rq->protocolo;
        $newRequest->date = $rq->data;
        $newRequest->description = $rq->descricao;
        $newRequest->save();
    return redirect('/home');

    }
}   