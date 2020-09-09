<?php

namespace App\Http\Controllers\UI;

use App\Models\Admin\City;
use Illuminate\Http\Request;
use App\Models\Admin\District;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function checkOut()
    {
        return view ('ui.cart.checkout');
    }

    public function getCity()
    {
        return Response::json(City::all());
    }

    public function getDistrict(Request $request)
    {
        $city_id = $request->get('id');

        return Response::json(District::where('city_id', $city_id)->get());
    }
}
