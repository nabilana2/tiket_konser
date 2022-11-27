<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return $customer ;
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
        $table = Customer::create([
            "nama" => $request->nama,
            "metode_membayar" => $request->metode_membayar,
            "harga" => $request->harga,
            "date_of_issue" => $request->date_of_issue
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil dimasukan',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = customer::find($id);
        if ($customer) {
            return response()->json([
                'status' => 200,
                'data' => $customer
            ], 200);
        }else{
            return response()->json([
                'status'=> 404,
                'message' => 'id atas' . $id . 'tidak ditemukan'
            ], 404);
        
        }
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
        $customer = customer::find($id);
        if($customer){
            $customer->nama = $request->nama? $request->nama : $customer->nama;
            $customer->metode_membayar= $request->no_booking? $request->no_booking: $customer->no_booking;
            $customer->harga = $request->harga ? $request->harga : $customer->harga;
            $customer->date_of_issue= $request->date_of_issue ? $request->date_of_issue : $customer->date_of_issue;
            $customer->save();
            return response()->json([
                'status' => 200,
                'data' => $customer
            ], 200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> $id . 'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = transaksi::where('id',$id)->first();
        if($customer){
            $customer->delete();
            return response()->json([
                'status' =>200,
                'data' =>$customer
            ],200);
        }else{
            return response ()->json([
                'status' => 404,
                'message' => 'id' . $id .'tidak ditemukan'
            ],404);
        }
    }
}
