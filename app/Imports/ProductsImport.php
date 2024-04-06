<?php

namespace App\Imports;


use App\Models\Products;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;



class ProductsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    private $validationErrors = [];

    public function collection(Collection $rows)
    {
        try {
            DB::beginTransaction();
            
            foreach ($rows as $index => $row) {
                $rowArray = $row->toArray();
                // Example validation
                $validator = Validator::make($rowArray, [
                    'name' => 'required|unique:products,name|max:255',
                    // Add validation rules for other fields
                ]);

                if ($validator->fails()) {
                    $errors = $validator->errors();
                    foreach ($errors->keys() as $key) {
                        $this->validationErrors[] = [
                            'column' => $index,
                            'message' => $errors->first($key),
                        ];
                    }
                }
                 // Convert the collection to an array
                $images = []; // Array to store image file paths
                foreach (json_decode($rowArray['images']) as $image) {
                    $images[] = $this->uploadImage($image); // Upload image and get the file path
                }
        
                $name = $rowArray['name'];
                $sku = $rowArray['sku'];
                $description = $rowArray['description'];
                $price = $rowArray['price'];
                // Save the product to the database
                Products::create([
                    'name' => $name,
                    'sku' => $sku,
                    'description' => $description,
                    'price' => $price,
                    'images' => $images, // Store image file paths as JSON
                ]);
            }
        
            DB::commit();
            // Return a success response
            return response()->json(['message' => 'Products imported successfully'], 200);
        } catch (ValidationException $e) {
            DB::rollBack();
            // Return an error response with validation error messages
            return response()->json(['message' => 'Error importing products: ' . implode(', ', $e->validator->getMessageBag()->all())], 422);
        } catch (QueryException $e) {
            DB::rollBack();
            // Return an error response
            return response()->json(['message' => 'Error importing products: ' . $e->getMessage()], 500);
        }
        
    }

    private function uploadImage($image)
    {
        $imageContent = file_get_contents($image);
        // Specify the destination path where you want to save the image
        $destinationPath = public_path('images/products/'); // Assuming 'images' is a directory in your public folder
        // Generate a unique filename for the image
        $baseName = uniqid() . '_' .basename($image);
        
        $filename = preg_replace('/[^a-zA-Z0-9\/_. ]/', '_', $baseName);
        $url = url('/').'/public/images/products/'.$filename;
        // Save the image to the specified destination path
        if (!file_exists($destinationPath . '/' . $filename)) {
            file_put_contents($destinationPath . '/' . $filename, $imageContent);
        }
        return $url;
    }

    public function rules(): array
    {
        return [
            // Define validation rules for each column
            'name' => 'required|unique:products,name|max:255',
            // Add validation rules for other columns
        ];
    }

    public function getValidationErrors()
    {
        return $this->validationErrors;
    }
}
