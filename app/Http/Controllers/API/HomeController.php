<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

use Illuminate\Support\Facades\Validator;
use App\Mail\SendEmailWithAttachment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    //
    public function addProduct(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products,name|max:255', // Check if 'name' is unique in 'products' table
            // Add other validation rules for other fields
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(),"code" => 400,"data" => []], 200);
        }
        

        // gmail code
        // $email = new SendEmailWithAttachment($request);
        // Mail::to('ajithbuddy22@gmail.com')->send($email);
        
        $images = $request->file('images');
        $imagesArr = [];
        foreach ($images as $image) {
            $fileExactName = preg_replace('/[^a-zA-Z0-9\/_. ]/', '_', $image->getClientOriginalName());
            $imageName = time() . "_" . $fileExactName;
            // Move the uploaded file to the desired location
            $path = 'public/images/products/'.$imageName;
            $imagesArr[] = url('/')."/".$path;
            $image->move(public_path('images/products/'), $path);
            // You can also save the file details to the database if needed
        }        
        $product = new Products();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->images = $imagesArr;  
        $insertedProduct = $product->save();
        if($insertedProduct){                       
            return response()->json(['message' => 'Product created successfully',"code" => 200,"data" => $imagesArr], 200);    
        } else{
            return response()->json(['message' => "Something Went Wrong!","code" => 400,"data" => []], 200);            
        }
    }
}
