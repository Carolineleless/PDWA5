<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MakeupProducts;
use Illuminate\Validation\ValidationException;

class MakeupProductsController extends Controller
{
    public function saveQuiz(Request $request)
    {
        try {
            $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'marca' => 'required|string|max:100',
            'preco' => 'required|numeric',
            'ingredientes' => 'nullable|string',
        ]);

            $formattedNumber = $this->formatNumber($request->preco);
            $request->merge(['preco' => $formattedNumber]);

            if (MakeupProducts::checkingRegistered($request->nome, $request->marca)) {
                return response()->json(['message' => 'Essa maquiagem já está cadastrada no sistema.', 'success' => false]);
            }

            $makeup = new MakeupProducts();
            $makeup->product_name = $request->nome;
            $makeup->product_type = $request->tipo;
            $makeup->brand = $request->marca;
            $makeup->price = $request->preco;
            $makeup->ingredients = $request->ingredientes;
            $makeup->save();

            return response()->json(['success' => true, 'message' => 'Maquiagem cadastrada com sucesso!']);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Todos os campos obrigatórios devem ser preenchidos com o formato correto.', 'success' => false]);
        }
    }

    private function formatNumber($number) {
        $number = (float) $number;  
        return number_format($number, 2, '.', '');
    }
}
