<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CartItems;
use App\Models\Carts;


class CartItemsController extends Controller
{
    public function create(Request $request)
    {
        /*原生SQL寫法 
        $data = $request->all();
        DB::table('cart_items')->insert([
            'carts_id' => $data['carts_id'],
            'products_id' => $data['products_id'],
            'quantity' => $data['quantity'],
            'created_at' => now(),
            'updated_at' => now()
        ]);
        */
        $cart = Carts::find($request['carts_id']);
        //$result = 
        return response()->json(true);
    }
    public function read($id)
    {
        $data = DB::table('cart_items')->where('id', $id)->get();
        if (empty($data)) {
            return response()->json('id does not exist');
        } else {
            return response(collect($data));
        }
    }
    public function update(Request $request, $id)
    {
        //原生SQL寫法
        $data = $request->all();
        $form = DB::table('cart_items')->where('id', $id)->get();
        if (empty($form)) {
            return response()->json('id does not exist');
        } else {
            DB::table('cart_items')->where('id', $id)->update([
                'quantity' => $data['quantity'],
                'updated_at' => now()
            ]);
            return response()->json(true);
        }
    }
    public function delete($id)
    {
        $data = DB::table('cart_items')->where('id', $id)->get();
        if (empty($data)) {
            return response()->json('id does not exist');
        } else {
            DB::table('cart_items')->where('id', $id)->delete();
            return response()->json(true);
        }
    }
}
