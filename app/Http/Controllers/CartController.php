<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function create()
    {
        DB::table('carts')->insert(['created_at' => now(), 'updated_at' => now()]);
        return response()->json('true');
    }
    public function read()
    {
        $data = DB::table('carts')->get()->first();
        DB::table('carts')->where('id', $data->id)->update(['created_at' => now(), 'updated_at' => now()]);
        $cartItems = DB::table('cart_items')->where('id', $data->id)->get();
        $data = collect($data);
        $data['items'] = collect($cartItems);
        return response(collect($data));
    }
    public function update(Request $request, string $id)
    {
    }
    public function delete()
    {
    }
}
