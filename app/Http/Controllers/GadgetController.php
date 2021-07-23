<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gadget;
use Exception;

class GadgetController extends Controller
{
    public function show(Gadget $gadget) {
        return response()->json($gadget,200);
    }

    public function search(Request $request) {
        $request->validate(['key'=>'string|required']);

        $gadgets = Product::where('name','like',"%$request->key%")
            ->orWhere('description','like',"%$request->key%")->get();

        return response()->json($gadgets, 200);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'string|required',
            'brand' => 'string|required',
            'description' => 'string|required',
            'price' => 'numeric|required',
            'stock' => 'numeric|required',
        ]);

        try {
            $gadget = Gadget::create($request->all());
            return response()->json($gadget, 202);
        }catch(Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage()
            ],500);
        }

    }

    public function update(Request $request, Gadget $product) {
        try {
            $gadget->update($request->all());
            return response()->json($gadget, 202);
        }catch(Exception $ex) {
            return response()->json(['message'=>$ex->getMessage()], 500);
        }
    }

    public function destroy(Gadget $gadget) {
        $gadget->delete();
        return response()->json(['message'=>'Gadget deleted.'],202);
    }

    public function index() {
        $gadgets = Gadget::orderBy('name')->get();
        return response()->json($products, 200);
    }
}
