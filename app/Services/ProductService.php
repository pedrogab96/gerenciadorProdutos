<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getAll()
    {
        return Product::all();
    }

    public function getById($id)
    {
        return Product::find($id);
    }
    
    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update($id, array $data)
    {
        $product = Product::find($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return $product;
    }
}