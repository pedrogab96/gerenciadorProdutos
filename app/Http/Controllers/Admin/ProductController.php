<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = (new ProductService())->getAll();
        return view('admin.product.index')
            ->with('products', $products);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token', 'submit');
        $value = str_replace('R$ ', '', $data['price']);
        $value = str_replace('.', '', $value);
        $data['price'] = str_replace(',', '.', $value);

        $product = (new ProductService())->create($data);
        return redirect()->route('admin.products.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $product = (new ProductService())->getById($id);
        $product->price = str_replace('.', ',', $product->price);
        return view('admin.product.edit')
            ->with('product', $product);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', 'submit');
        $value = str_replace('.', '', $data['price']);
        $data['price'] = str_replace(',', '.', $value);

        $product = (new ProductService())->getById($id);
        $product->update($data);
        return redirect()->route('admin.products.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $product = (new ProductService())->getById($id);
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('success', 'Produto excluído com sucesso!');
    }
}
