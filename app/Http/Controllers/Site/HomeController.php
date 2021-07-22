<?php

namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Cart;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productImage = ProductImage::paginate(8);
        $products = Product::All();
//        $cartItems = \Cart::getContent();
        return view('site.pages.homepage', compact('products', $products, $productImage));
    }
}
