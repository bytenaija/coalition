<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $contents = Storage::disk('uploads')->get('products.json');
         $contents = json_decode($contents);
        usort($contents->products, function($a, $b) {
            //dd($a); //Sort the array using a user defined function
            return date($a->date) > date($b->date) ? 1 : -1; //Compare the scores
        });

        return view('home', compact('contents'));
    }

    public function save(Request $request){
        $product = new \stdClass;
        $product->productName = $request->Productname;
        $product->quantity = $request->quantityinstock;
        $product->price = $request->priceperitem;
        $product->date = date('Y-m-d H:i:s');
        $contents = Storage::disk('uploads')->get('products.json');
        $fileDecode = json_decode($contents);
        array_push($fileDecode->products, $product);
        Storage::disk('uploads')->put('products.json',json_encode($fileDecode));
        return response()
            ->json(['success'=> true, 'message'=>"Successfully saved"]);
    }

    public function edit(Request $request, $index){


        $product = new \stdClass;
        $product->productName = $request->Productname;
        $product->quantity = $request->quantityinstock;
        $product->price = $request->priceperitem;
        $product->date = date('Y-m-d H:i:s');
        $contents = Storage::disk('uploads')->get('products.json');
        $fileDecode = json_decode($contents);
        $product->date = $fileDecode->products[$index]->date;

        $fileDecode->products[$index] = $product;


       Storage::disk('uploads')->put('products.json',json_encode($fileDecode));
        return response() ->json(['success'=> true, 'message'=>"Successfully edited product"]);
    }
}
