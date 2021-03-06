<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = (new ProductService())->getProducts();
        return view('admin.product.index')
            ->with('products', $products);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(ProductRequest $request)
    {
        $request->validated();
        $data = $request->except('_token', 'submit');
        $product = (new ProductService())->create($data);
        return redirect()->route('admin.products.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit($product_id)
    {
        $product = (new ProductService())->getProductById($product_id);
        $product->price = str_replace('.', ',', $product->price);
        return view('admin.product.edit')
            ->with('product', $product);
    }

    public function update(ProductRequest $request, $product_id)
    {
        $request->validated();
        $data = $request->except('_token', 'submit');
        $value = str_replace('.', '', $data['price']);
        $data['price'] = str_replace(',', '.', $value);

        $product = (new ProductService())->getProductById($product_id);
        $product->update($data);
        return redirect()->route('admin.products.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($product_id)
    {
        $product = (new ProductService())->getProductById($product_id);
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('success', 'Produto excluído com sucesso!');
    }
}
