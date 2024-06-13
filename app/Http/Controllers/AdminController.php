<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DamagedProduct;
use App\Models\ReturnNote;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        
        $damagedProducts = DamagedProduct::with('product', 'returnNote')->get();
        return view('admin.index', compact('damagedProducts'));
    }
    

    public function createReturnNote(Request $request)
    {
        $validatedData = $request->validate([
            'damaged_product_id' => 'required|exists:damaged_products,id',
            'note' => 'required|string',
        ]);

        ReturnNote::create([
            'damaged_product_id' => $validatedData['damaged_product_id'],
            'note' => $validatedData['note'],
        ]);

        return redirect('/admin')->with('success', 'Return note created successfully');
    }

    public function getProductDamaged($id)
    {
        $damagedProduct = DamagedProduct::with(['product', 'supplier'])->findOrFail($id);

        return response()->json([
            'damaged_product_id' => $damagedProduct->id,
            'note' => $damagedProduct->note,
            'quantity' => $damagedProduct->quantity,
            'product_name' => $damagedProduct->product->name,
            'supplier_name' => $damagedProduct->supplier->name,
            'supplier_address' => $damagedProduct->supplier->address,
            'supplier_phone_number' => $damagedProduct->supplier->phone,
        ]);
    }

    public function storeReturnNote(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'damaged_product_id' => 'required',
            'price' => 'required|numeric',
            'total' => 'required|numeric',
            'notaNumber' => 'required|string',
            'purchaseDate' => 'required|date',
            'customerName' => 'required|string',
            'customerPhoneNumber' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $returnNote = new ReturnNote();
        $returnNote->damaged_product_id = $request->damaged_product_id;
        $returnNote->note_number = $request->notaNumber;
        $returnNote->purchase_date = $request->purchaseDate;
        $returnNote->customer_name = $request->customerName;
        $returnNote->customer_phone_number = $request->customerPhoneNumber;
        $returnNote->price = $request->price;
        $returnNote->total = $request->total;
        $returnNote->status = 'pending';
        $returnNote->save();
       
        return redirect('/admin')->with('success', 'Return note created successfully'); 
    }


    public function printReturnNote($damageID)
    {
        $returnNote = ReturnNote::with('damagedProduct.product', 'damagedProduct.supplier')
                                ->where('damaged_product_id', $damageID)
                                ->firstOrFail();
    
        return view('admin.nota-print', compact('returnNote'));
    }
    
}

    
