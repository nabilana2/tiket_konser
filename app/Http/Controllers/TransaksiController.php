<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return $transaksi ;
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
        $table = Transaksi::create([
            "nama" => $request->nama,
            "no_booking" => $request->no_booking,
            "section" => $request->section,
            "harga" => $request->harga,
            "date_of_issue" => $request->date_of_issue
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'transaksi berhasil dilakukan',
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
        $transaksi = transaksi::find($id);
        if ($transaksi) {
            return response()->json([
                'status' => 200,
                'data' => $transaksi
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
        $transaksi = transaksi::find($id);
        if($transaksi){
            $transaksi->nama = $request->nama? $request->nama : $transaksi->nama;
            $transaksi->no_booking= $request->no_booking? $request->no_booking: $transaksi->no_booking;
            $transaksi->section = $request->section ? $request->section : $transaksi->section;
            $transaksi->harga = $request->harga ? $request->harga : $transaksi->harga;
            $transaksi->date_of_issue= $request->date_of_issue ? $request->date_of_issue : $book->date_of_issue;
            $transaksi->save();
            return response()->json([
                'status' => 200,
                'data' => $transaksi
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
        $transaksi = transaksi::where('id',$id)->first();
        if($transaksi){
            $transaksi->delete();
            return response()->json([
                'status' =>200,
                'data' =>$transaksi
            ],200);
        }else{
            return response ()->json([
                'status' => 404,
                'message' => 'id' . $id .'tidak ditemukan'
            ],404);
        }
    }
}
