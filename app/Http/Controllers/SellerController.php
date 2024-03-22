<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;

class SellerController extends Controller
{

    public function createSeller(Request $request){
        $seller = new Seller;
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->save();
        return response()->json($seller);
    }

    public function listSeller(){
        $seller = Seller::all();
        return response()->json($seller);
    }
}
