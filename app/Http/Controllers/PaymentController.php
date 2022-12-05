<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Mobil;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Payment::all();
        return $table;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // {
    //     $message = [
    //         "shoe_id"=>"masukan",
    //         "users_id"=>"masukan",
    //         "payment_total"=>"total",
    //         "payment_date"=>"date"
    //     ];
    //     $validasi = Validator::make($request->all(),[
    //         "shoe_id" => "required",
    //         "users_id" => "required",
    //         "payment_total" => "required",
    //         "payment_date" => "required",
    //     ], $message);
    //     if ($validasi->fails()) {
    //         return $validasi->errors();
    //     }
    //     $data = Payment::create($validasi->validate());
    //     $data->save();

    //     return response()->json([
    //         "message" => "Data Succes",
    //         "data" => $data
    //     ], 201);
    // }
    {
        $table = new Payment();
        $table->shoe_id = $request->shoe_id ? $request->shoe_id : $table->shoe_id;
        $table->users_id = $request->users_id ? $request->users_id : $table->users_id;
        $table->payment_total = $request->payment_total ? $request->payment_total : $table->payment_total;
        $table->payment_date = $request->payment_date ? $request->payment_date : $table->payment_date;
        $table->save();

        // return $table;
        return response()->json([
            "message" => "Data berhasil ditambahkan",
            "data" => $table
        ], 201);
        
    }

    public function show($id)
    {
        $table = Payment::find($id);
        if($table){
            return $table;
        }else{
            return ["message" => "Data not found"];
        }
    }

    public function destroy($id)
    {
        $table = Payment::find($id);
        if ($table){
            $table->delete();
            return ["message" => "Delete succes"];
        }else{
            return ["message" => "Data not found"];
        }
    }

    public function update(Request $request, $id)
    {
        $table = Payment::find($id);
        if ($table){
            $table->transaction_id = $request->transaction_id ? $request->transaction_id : $table->transaction_id;
            $table->shoe_id = $request->shoe_id ? $request->shoe_id : $table->shoe_id;
            $table->user_id = $request->user_id ? $request->user_id : $table->user_id;
            $table->payment_total = $request->payment_total ? $request->payment_total : $table->payment_total;
            $table->payment_date = $request->payment_date ? $request->payment_date : $table->payment_date;
            $table->save();

            return $table;
        }else{
            return ["message" => "Data not found"];
        }
    }

}