<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    function result()
    {
        return view('site.pages.result');
    }

    function action(Request $request)
    {
        $query = $request->search;

        $resultproducts = DB::table('products')
                    ->where('name', 'like', '%'.$query.'%')
                    ->orWhere('slug', 'like', '%'.$query.'%')
                    ->orWhere('description', 'like', '%'.$query.'%')
                    ->orWhere('sale_price', 'like', '%'.$query.'%')
                    ->orderBy('id', 'desc')
                    ->get();
        if(count($resultproducts)>0){
            foreach($resultproducts as $result){
                $id = $result->id;
            }


            $imageproducts = ProductImage::where('product_id',$id)->get();


            return view('site.pages.result',compact('resultproducts','imageproducts'));
        }else{
            return view('site.pages.resultnoData');
        }

    }
    public function resultnoData(){
        return view('site.pages.resultnoData');
    }

}
