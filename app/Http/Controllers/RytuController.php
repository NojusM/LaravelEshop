<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class RytuController extends Controller
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
            $products = DB::table('products')->where('category_id',4)->paginate(3);
        }
        $allprod = Product::All();
        return view('pages.rytushop')->with([
            'tod' => $allprod,
            'products' => $products,
            'types' => $types])->layout("layouts.app");
    }

    public function show($title)
    {

        $product = Product::where('title',$title)->firstOrFail();
        return view('pages.productzoom', compact('product'));

    }
}
