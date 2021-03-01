<?php

namespace App\Http\Controllers;


use App\Http\Requests\BuyRequest;
use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\NewProductRequest;
use App\Mail\OrderPlacedMail;
use App\Mail\TodayOrdersMail;
use App\Models\Orders;
use App\Models\Products;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;


class ProductController extends Controller
{
    public function buy(BuyRequest $request)
    {
        Orders::addNewOrder($request->name, $request->adress, $request->amount, $request->product_id);
        $order = Orders::where(['product_id' => $request->product_id])->first();
        Mail::to('susicuros@gmail.com')->send(new OrderPlacedMail($order));
        Mail::to($request->email)->send(new OrderPlacedMail($order));
        return redirect()->route('home_page');
    }

    public function checkout(CheckoutRequest $request)
    {
        $product_id = $request->product_id;
        $product = Products::where(['id' => $product_id])->first();
        return view('checkout', ['product' => $product]);
    }
    public function getRandomProduct()
    {
        $products = Products::randomProduct();
        return view('homePage', ['products' => $products]);
    }

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
