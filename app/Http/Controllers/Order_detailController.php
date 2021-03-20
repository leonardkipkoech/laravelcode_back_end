<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order_detail;

class Order_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order_detail::orderBy('created_at', 'DESC')->get();
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
        $newOrder_detail = new Order_detail();
        $newOrder_detail->order_id = $request->order_detail['order_id'];
        $newOrder_detail->product_id = $request->order_detail['product_id'];
        $newOrder_detail->save();
        return $newOrder_detail;
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
        $existingOrder_detail = Order_detail::find($id);
        if ($existingOrder_detail) {
            $existingOrder_detail->order_id = $request->order_detail['order_id'] ? true : false;
            $existingOrder_detail->product_id = $request->order_detail['product_id'] ? Carbon::now() : null;
            $existingOrder_detail->save();
            return $existingOrder_detail;
        }
        return "Order detail not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingItem = Order_detail::find($id);
        if ($existingItem) {
            $existingItem->delete();
            return "Order detail successfully deleted";
        }
        return "Order detail not found";
    }
}