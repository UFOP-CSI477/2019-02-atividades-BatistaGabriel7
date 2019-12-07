<?php

namespace App\Http\Controllers;

use App\requests;
use App\subjects;

use Illuminate\Http\Request;


class AdministradorController extends Controller
{
    public function listaProtocolos()
    {
        $subjects = subjects::orderBy('name')->get();
        return view('administradorProtocolo', compact('subjects'));
    }

    public function registroProtocolos()
    {
        return view("administradorRegistro");
    }

    public function store(Request $request){
        $subject = new Subjects;
        $subject->name = $request->nome;
        $subject->price = $request->preco;
        $subject->save();
        return redirect('/administrador');
    }

   public function destroy($id){
        if(Requests::where('subject_id',$id)->exists()){
            return redirect('/administrador');
        }
        $subjects = Subjects::findOrFail($id);
        $subjects->delete();
        return redirect('/administrador');
    }

     public function update(Request $request,$id){
        $newRequest = Subjects::findOrFail($id);
        $newRequest->price = $request->preco;
        $newRequest->name = $request->nome;
        $newRequest->save();
        return redirect('/administrador');
    }
}
    