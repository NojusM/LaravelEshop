<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class FigurelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::All();
        if(request()->type)
        {
            $temp = request()->type;
            $products = DB::table('products')->where('type_id',$temp)->paginate(3);
        }else {
            $products = DB::table('products')->where('category_id',1)->paginate(3);
        }
        $allprod = Product::All();

        return view('pages.figurelesshop')->with([
            'tod' => $allprod,
            'products' => $products,
            'types' => $types])->layout("layouts.app");
    }

    public function show($title)
    {
        $product = Product::where('title',$title)->firstOrFail();

        return view('pages.productzoom', compact('product'));

    }

    public function search(Request $request)
    {
          $request -> validate([
//            regex:/^[a-zA-Z\s]*$/
           'query' => 'min:3|max:20|alpha',
            'queryMax' => 'integer',
            'queryMin' => 'integer'
        ]);

        $min_price = request()->input('queryMin')?: 0;
        $max_price = request()->input('queryMax')?: 9999;
        $query = request()->input('query');

        $products = Product::where('title','like',"%$query%")->whereBetween('price', [$min_price, $max_price])->get();

        return view('pages.search', compact('products'));
    }
}
