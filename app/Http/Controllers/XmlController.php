<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MakeupProducts;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Response;


class xmlController extends Controller
{
    public function generateXml(Request $request)
    {
        try {
            $makeupProducts = MakeupProducts::all();

            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->formatOutput = true; // Habilitar a formatação de saída
            $root = $dom->createElement('data');
            
            foreach ($makeupProducts as $makeup) {
                $product = $dom->createElement('makeup');
                
                $name = $dom->createElement('name', htmlspecialchars($makeup->product_name));
                $type = $dom->createElement('type', htmlspecialchars($makeup->product_type));
                $brand = $dom->createElement('brand', htmlspecialchars($makeup->brand));
                $price = $dom->createElement('price', number_format($makeup->price, 2, '.', ''));
                $ingredients = $dom->createElement('ingredients', htmlspecialchars($makeup->ingredients));
                
                $product->appendChild($name);
                $product->appendChild($type);
                $product->appendChild($brand);
                $product->appendChild($price);
                $product->appendChild($ingredients);
                
                $root->appendChild($product);
            }
    
            $dom->appendChild($root);
            $xmlString = $dom->saveXML();
    
            return response($xmlString, 200)->header('Content-Type', 'application/xml');
    
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Não foi possível gerar o XML. Tente novamente mais tarde.', 'success' => false]);
        }
    }

}
