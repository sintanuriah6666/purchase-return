<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\DamagedProduct;
use App\Models\Supplier;


class WarehouseController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::pluck('name', 'id');
        $products = Product::all();
        return view('warehouse.index', compact('products', 'suppliers'));
    }

    public function checkProduct(Request $request)
    {
     
        $validatedData = $request->validate([
            'product_code' => 'required',
            'name' => 'required_if:product_type,new',
            'supplier_id' => 'required',
            'quantity' => 'required|integer',
            'quality' => 'required|in:good,damaged',
            'note' => 'nullable',
            'product_type' => 'required|in:new,existing',
        ]);

        if ($validatedData['product_type'] == 'new') {
            $product = Product::create([
                'product_code' => $validatedData['product_code'],
                'name' => $validatedData['name'],
                'supplier_id' => $validatedData['supplier_id'],
                'quantity' => $validatedData['quantity'],
            ]);
        } else {
            $product = Product::where('product_code', $validatedData['product_code'])->first();
            if (!$product) {
                return redirect('/warehouse')->with('error', 'Product not found');
            }
            $product->quantity += $validatedData['quantity'];
            $product->save();
        }
    
       
        if ($validatedData['quality'] == 'damaged') {
            DamagedProduct::create([
                'supplier_id' => $product->supplier_id,
                'product_code' => $product->product_code,
                'quantity' => $validatedData['quantity'],
                'note' => $validatedData['note'],
            ]);
        }
    
        return redirect('/warehouse')->with('success', 'Product checked successfully');
    }
    
    public function getProductDetails($id)
    {
        $product = Product::find($id);

        return response()->json([
            'name' => $product->name,
        ]);
    }
    
    
}
