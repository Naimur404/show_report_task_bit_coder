<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Http::get('https://raw.githubusercontent.com/Bit-Code-Technologies/mockapi/main/purchase.json')->json();
        $data = collect($product);
        $data->map(function ($item) {


            Product::updateOrCreate(
                ['order_no' => $item['order_no']],
                [
                'name' => $item['name'],
                'order_no' => $item['order_no'],
                'user_phone' => $item['user_phone'],
                'product_code' => $item['product_code'],
                'product_name' => $item['product_name'],
                'product_price' => $item['product_price'],
                'purchase_quantity' => $item['purchase_quantity'],
                'created_at' => $item['created_at'],
            ]);



        });
        return response()->json(['status' => 'sucess', 'msg' => 'Data Fatch Sucessfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = DB::table('products')->orderByRaw('(product_price * purchase_quantity) DESC')->get();
        $price = DB::table('products')->sum('products.product_price');
        $quantity= DB::table('products')->sum('products.purchase_quantity');

        // $calculatedPrice = $products->product_price * $products->purchase_quantity;
        // $products = DB::table('products')->where($calculatedPrice >= 'product_price' * 'purchase_quantity');

        return view('components.show',['products' => $products,
        'price' => $price,
        'quantity' => $quantity

    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
