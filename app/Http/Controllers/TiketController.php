<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiket = tikets::all();
        return $tiket ;
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
        // $table = tiket::create([
        //     "nama" => $request->nama,
        //     "no_pesanan" => $request->no_pesanan,
        //     "section" => $request->section,
        //     "harga" => $request->harga,
        //     "date_of_issue" => $request->date_of_issue
        // ]);

        $tiket = new tikets();
        $tiket->nama = $request->input('nama');
        $tiket->no_pesanan = $request->input("no_pesanan");
        $tiket->section = $request->input("section");
        $tiket->harga = $request->input("harga");
        $tiket->date_of_issue = $request->input("date_of_issue");
        $tiket->save();

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $tiket
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
        $tiket = tikets::find($id);
        if ($tiket) {
            return response()->json([
                'status' => 200,
                'data' => $tiket
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
        $tiket = tikets::find($id);
        if($tiket){
            $tiket->nama = $request->nama? $request->nama : $tiket->nama;
            $tiket->no_pesanan = $request->no_pesanan? $request->no_pesanan: $tiket->no_pesanan;
            $tiket->section = $request->section ? $request->section : $tiket->section;
            $tiket->harga = $request->harga ? $request->harga : $tiket->harga;
            $tiket->date_of_issue= $request->date_of_issue ? $request->date_of_issue : $book->date_of_issue;
            $tiket->save();
            return response()->json([
                'status' => 200,
                'data' => $tiket
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
        $tiket = tikets::where('id',$id)->first();
        if($tiket){
            $tiket->delete();
            return response()->json([
                'status' =>200,
                'data' =>$tiket
            ],200);
        }else{
            return response ()->json([
                'status' => 404,
                'message' => 'id' . $id .'tidak ditemukan'
            ],404);
        }
    }
}
