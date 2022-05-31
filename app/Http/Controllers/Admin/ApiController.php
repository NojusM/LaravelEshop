<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use GuzzleHttp\Client;
//use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request;
use phpDocumentor\Reflection\Types\Collection;

class ApiController extends Controller
{
    public function products()
    {
        return Product::inRandomOrder()->limit(5)->get();
    }

    function productsid($id=null)
    {
        return Product::find($id);
    }

    function api()
    {
        $datas = Product::inRandomOrder()->limit(5)->get();
        //dd($datas);
        //Create client
        $client = new Client(['base_uri' => 'http://localhost:8001/api/products/', 'timeout'  => 5]);
        //Create Collection
        $data = new \Illuminate\Database\Eloquent\Collection;
        $data->add(new Product);
        //Create model product
        $temp = new Product;
        //Add to collection
        for ($x = 10; $x < 15; $x++) {
            $response = $client->get(strval($x));
            $json = json_decode($response->getBody(), true);
            $temp->fill($json);
            $data->push($temp);
        }

        return view('admin.dashboard',compact('datas'));
    }

}
