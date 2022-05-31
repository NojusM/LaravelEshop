<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::pluck('title', 'id');
        $types->prepend('---Please select---', 0);
        $types->all();

        $categories = Category::pluck('title', 'id');
        $categories->prepend('---Please select---', 0);
        $categories->all();

        return view('admin.products.form', compact( 'types','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:200',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'animeimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'type_id' => 'required'
        ]);

        $data = $request->all();
        if ($request->hasFile('animeimg')) {
            $fileName = time().'.'.$request->animeimg->extension();
            $request->animeimg->move(public_path('uploads/animeimg'), $fileName);
            $data['animeimg'] = $fileName;
        }

        Product::create($data);
        return redirect('admin/products')->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::findOrFail($id);
        return view('admin.products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);

        $types = Type::pluck('title', 'id');
        $types->prepend('---Please select---', 0);
        $types->all();

        $categories = Category::pluck('title', 'id');
        $categories->prepend('---Please select---', 0);
        $categories->all();

        $products = Product::findOrFail($id);
        return view('admin.products.form', compact('products',  'types', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:200',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'animeimg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'type_id' => 'required'
        ]);


        $data = $request->all();
        if ($request->hasFile('animeimg')) {
            $fileName = time().'.'.$request->animeimg->extension();
            $request->animeimg->move(public_path('uploads/animeimg'), $fileName);
            $data['animeimg'] = $fileName;
        }


        $products = Product::findOrFail($id);
        $products->update($data);
        return redirect('admin/products')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect('admin/products')->with('success', 'Product deleted successfully.');
    }
}
