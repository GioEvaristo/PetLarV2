<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;


class Adotar extends Controller
{
   public function goto()
   {
       return view('adotar');
   }


}

   public function index(Request $request)
   {
       $query = Produtos::query(); // Inicia a consulta com o modelo


       // Filtro por nome (usando LIKE)
       if ($request->has('cor') && $request->cor) {
           $query->where('cor', 'LIKE', "%{$request->cor}%");
       }


       // Filtro por ano (usando created_at)
       if ($request->has('ano') && $request->ano) {
           $query->whereYear('created_at', $request->ano);
       }


       // Opcional: Paginação e retorno dos resultados
       $produtos = $query->paginate(10)->appends($request->all()); // Adiciona os parâmetros da requisição ao link da paginação


       return view('adotar.index', compact('produtos'));
   }
