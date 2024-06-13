<?php

namespace App\Http\Controllers;
 
use App\Models\Product;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;



class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));

    }

   

    public function export($format)
    {
        $export = new ProductsExport();
    
        if ($format == 'excel') {
            return Excel::download($export, 'products.xlsx');
        } elseif ($format == 'pdf') {
            return Excel::download($export, 'products.pdf', \Maatwebsite\Excel\Excel::MPDF);
        } else {
            abort(404);
        }
    }
    

}
