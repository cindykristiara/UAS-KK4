<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe;

class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoe = Shoe::all();
        return $shoe;
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
        $shoe = new Shoe();
        $shoe->ukuran = $request->input('ukuran');
        $shoe->brand = $request->input('brand');
        $shoe->warna = $request->input('warna');
        $shoe->harga = $request->input('harga');
        $shoe->save();

        return response()->json([
            'success' => 201,
            'data' => $shoe
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
        $shoe = shoe::find($id);
        if ($shoe) {
            return response()->json([
                'status' => 200,
                'data' => $shoe
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas ' . $id . 'tidak ditemukan'   
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
        $shoe = shoe::find($id);
        if($shoe){
            $shoe->ukuran = $request->ukuran ? $request->ukuran : $shoe->ukuran;
            $shoe->brand = $request->brand ? $request->brand : $shoe->brand;
            $shoe->warna = $request->warna ? $request->warna : $shoe->warna;
            $shoe->harga = $request->harga ? $request->harga : $shoe->harga;
            $shoe->save();
            return response()->json([
                'status' => 200,
                'data' => $shoe
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => $id . 'tidak ditemukan' 
            ],404);
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
        $shoe= shoe::where('id', $id)->first();
        if($shoe){
            $shoe->delete();
            return response()->json([
                'status' => 200,
                'data' => $shoe
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan' 
            ],404);
        }
    }
}
