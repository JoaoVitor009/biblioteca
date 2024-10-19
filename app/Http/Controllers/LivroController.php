<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{
    public function index(){
        $livros = Livro::paginate(10);
        return view('livros.index', compact('livros')); 
    }

    public function create(){
        return view('livros.create');
    }

    public function store(Request $request){
        Livro::create($request->all());
        return redirect()->route('livros.index');
    }

    public function edit(Livro $livro){
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, Livro $Livro){
        $Livro->update($request->all());
        return redirect()->route('livros.index');
    }

    public function destroy(Livro $Livro){
        $Livro->delete();
        return redirect()->route('livros.index');
    }
}