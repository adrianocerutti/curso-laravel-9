<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateProductsRequest;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$products = Products::select("id", "name")->where("name", "like", "Produto 2%")->get();
        /* $products = Products::join("brands", "products.brand_id", "=", "brands.id")
            ->select(
                "products.id",
                "products.name",
                "sku",
                "brand_id",
                "brands.name as brand_name"
            )
            ->get(); */

        $products = Products::get();

        return view("products.index", ["products" => $products]);
        //return redirect()->route("products.create");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrUpdateProductsRequest $request)
    {
        /* $data = $request->validate([
            "product_name" => "string|required|min:3|max:100",
            "sku" => "integer"
        ]); */

        $data = $request->all();

        return redirect()->back()->with("error", "Erro ao cadastrar produto");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = [
            0 => [
                "product_name" => "Produto 1",
                "sku" => "123",
                "description" => "Exemplo de descrição"
            ],
            1 => [
                "product_name" => "Produto 2",
                "sku" => "456",
                "description" => "Exemplo de descrição"
            ],
            2 => [
                "product_name" => "Produto 3",
                "sku" => "789",
                "description" => "Exemplo de descrição"
            ]
        ];

        return view("products.show", ["product" => $products[$id]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Products::find($id);

        return view("products.edit", ["product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOrUpdateProductsRequest $request, string $id)
    {
        $product = Products::where("id", $id)->update([
            "name" => $request->name,
            "sku" => $request->sku,
            "description" => $request->description
        ]);

        dd($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Products::where("id", $id)->delete();
        return "Registro deletado com sucesso!";
    }
}
