<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use  App\Http\Requests\UpdateCarItem;

class ProductController extends Controller
{
    public function ToHelloPage()
    {
        return redirect('/hello');
    }
    public function getData()
    {
        return collect([
            collect([
                'id' => 0,
                'title' => 1,
                'content' => 12,
                'comment' => 123
            ]),
            collect([
                'id' => 1,
                'title' => 2,
                'content' => 23,
                'comment' => 234
            ])
        ]);
    }
    public function send()
    {
        $data = $this->getData();
        return response($data);
    }
    public function update(Request $request, $id)
    {
        $form = $request->all();
        $data = $this->getData();
        $selectedData = $data->where('id', $id)->first();
        $selectedData = $selectedData->merge(collect($form));
        return response($selectedData);
        //note dd 和 dump 的區別就是 dd執行完就停了，dump會執行到最後一行
    }
    public function destroy($id)
    {
        $data = $this->getData();
        $data->filter(function ($product) use ($id) {
            if ($product['id'] != $id) {
                return $product;
            }
        });
        return response($data->values());
    }
    public function GetSqlData()
    {
        $data = DB::table('products')->get();
        return response($data);
    }
    public function test()
    {
        //select 語法
        //$data = DB::table('sbl_team_data')->select('win', 'season')->get();
        //$data = $data->addSelect('season')->get();

        //where語法
        //$data = DB::table('sbl_team_data')->where('win', '>', 'season')->get();
        //return response($data);
    }
    public function MiddlewareTest(Request $request)
    {
        return response('message has passed middleware!');
    }
    public function DataValidation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'carts_id' => 'required',
            'products_id' => 'required|integer',
            'quantity' => 'required|integer|between:1,10'
        ]);
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        return response('message has passed data validation!');
    }
    public function DataValidationInClass(UpdateCarItem $request)
    {
        $data = $request->validated();
        return response('message has passed data validation!');
    }
}
