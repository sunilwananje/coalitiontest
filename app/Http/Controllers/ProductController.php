<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $inp = file_get_contents(storage_path().'/products.json');
         $productArray = json_decode($inp,true);
         return view('add-product',compact('productArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = array(
                       "product_name"=>$request->product_name,
                       "quantity"=>$request->quantity,
                       "price"=>$request->price,
                       "total"=>$request->total,
                       "created_at"=>date('Y-m-d H:i:s'),
                      );
        $inp = file_get_contents(storage_path().'/products.json');
        $tempArray = json_decode($inp,true);
        if(!is_array($tempArray)){
         $tempArray = array();
        }
        array_push($tempArray,$products);
        $jsonData = json_encode($tempArray);
        file_put_contents(storage_path().'/products.json', $jsonData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
