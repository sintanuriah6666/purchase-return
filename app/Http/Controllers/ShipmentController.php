<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReturnNote;
use App\Models\ShipmentRecord;

class ShipmentController extends Controller
{
    public function index()
    {
        $returnNotes = ReturnNote::with('damagedProduct.product', 'damagedProduct.supplier')
        ->where('status', 'pending')
        ->get();    
        $shipments = ShipmentRecord::with('returnNote')->get();
        return view('shipment.index', compact('returnNotes', 'shipments'));
    }

    public function shipProduct(Request $request)
    {
        $validatedData = $request->validate([
            'return_note_id' => 'required|exists:return_notes,id',
            'shipment_date' => 'required|date',
        ]);

        $supplier = ReturnNote::with('damagedProduct.product', 'damagedProduct.supplier')->where
        ('id', $validatedData['return_note_id'])->first()->damagedProduct->supplier;
        ShipmentRecord::create([
            'return_note_id' => $validatedData['return_note_id'],
            'shipment_date' => $validatedData['shipment_date'],
            'supplier_name' => $supplier->name,
            'supplier_address' => $supplier->address,
        ]);

        $returnNote = ReturnNote::find($validatedData['return_note_id']);
        $returnNote->status = 'shipped';
        $returnNote->save();
    
        return redirect('/shipment')->with('success', 'Product shipped successfully');
    }

    public function showReturnNote($id)
    {
        $returnNote = ReturnNote::findOrFail($id);
        return view('shipment.show-return-note', compact('returnNote'));
    }

    public function report()
    {
        $shipments = ShipmentRecord::with('returnNote')->get();
        return view('shipment.report', compact('shipments'));
    }
}
