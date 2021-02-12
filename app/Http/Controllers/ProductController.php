<?php

namespace App\Http\Controllers;


use App\Http\Requests\NewProductRequest;
use App\Models\Products;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{

    public function addNewProduct(NewProductRequest $request)
    {
        $name = $request->get('name');
        $price = $request->get('price');
        $amount = $request->get('amount');
        $category_id = 1; // TODO: Dodati kategorije

        Products::addProduct($name, $price, $amount, $category_id);

        return response()->json([
            'success' => true,
        ]);
    }

    public function showCreateProductForm()
    {
        return view("newProduct");
    }


    public function recent($test): string
    {
        $recent = "Recent";
        return view("product", ["recent" => $recent]);
    }

    public function all($x): string
    {
        $all = "All";
        return view("product", ["all" => $all]);
    }

    public function issetProduct(string $productName)
    {
        // SELECT * FROM productshp a
        $product = Products::where(['name' => $productName])
            ->where('amount', '>', 0)
            ->first();

        return $product ?
            view('single_product', compact('product')) :
            redirect(route('home_page'));
    }
    public function showProductsTable()
    {
        $products = DB::table('products')->get('name');
        foreach ($products as $product)
        {
            echo "<li>" . $product->name . "</li>";
        }
    }

}
