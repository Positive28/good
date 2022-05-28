<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductMaterial;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(isset($request->data))
        {
            $arrLength = count($request->data);

            for($i = 0; $i < $arrLength; $i++) {

                if($request->data[$i]['product_code'] == 20)
                {
                    $item = Product::where('product_code', 20)->get();
                    $materials = ProductMaterial::where('product_id', $item[0]->id)->pluck('quantity')->toArray();

                    $ip = $materials[0] * $request->data[$i]['product_qty'];       // 300
                    $mato = $materials[1] * $request->data[$i]['product_qty'];     //60
                    $tugma = $materials[2] * $request->data[$i]['product_qty'];    //150


                }
            
            }
        }
        

        $items = Product::with('materials.warehouses')->get();

        return new ProductCollection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
