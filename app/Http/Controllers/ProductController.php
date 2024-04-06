<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Products::all(); // Assuming 'Product' is your model for products
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add(){
        return view("products.addproduct");
    }

    public function import(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response()->json(['message' => 'No file uploaded'], 422);
        }
        $file = $request->file('file');
        try {
            $import = new ProductsImport();
            Excel::import($import, $file);
            if(!empty($import->getValidationErrors())){
                return redirect()->route('dashboard')->with('failed','Product Name Already Exist.');
            }
            return redirect()->route('dashboard')->with('success', 'Products imported successfully.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('failed','Error importing products: ' . $e->getMessage());
        }
    }

}
