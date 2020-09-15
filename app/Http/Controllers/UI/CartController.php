<?php

namespace App\Http\Controllers\UI;

use Exception;
use Carbon\Carbon;
use App\Jobs\SendEmail;
use App\Models\Admin\City;
use App\Mail\SendMailOrder;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Profile;
use App\Models\Admin\District;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function checkOut()
    {
        if(Cart::count() > 0) {
            return view ('ui.cart.checkout');
        }

        return redirect()->route('ui.cart.index');
    }

    public function postCheckout(OrderRequest $request)
    {
        $data = $request->only('username', 'email', 'phone', '', 'customer_shipping_province', 'district_id', 'address', 'message_user');

        try{
            DB::beginTransaction();
            $order_profile_id = $this->addProfile($data);

            if($order_profile_id == false) {
                return $this->sendResult(['message' => 'Lỗi khi thêm tài khoản'], 400);
            }
            
            if(Cart::weight(0, null, '') > 3000) {
                $shipping_price = 0 ;
            } else {
                $shipping_price = $this->handleInfoDistrict($data['district_id'])['shipping_price'];
            }
            
            $data = [
                'price' => Cart::priceTotal(null, null, ''),
                'shipping_price' => $shipping_price,
                'total' => Cart::priceTotal(null, null, '') + (int) $shipping_price,
                'order_profile_id' => $order_profile_id,
                'message_user' => $data['message_user']
            ];
    
            $order = $this->createOrder($shipping_price, $order_profile_id, $data['message_user']);
            
            if(!$order) {
                return $this->sendResult(['message' => 'Lỗi khi thêm đơn hàng'], 400);
            }

            if($this->addOrderProduct($order)) {
                SendEmail::dispatch(new SendMailOrder($order->toArray()), 'nghia97dn@gmail.com');
                $request->session()->put('success', 'ok');
                DB::commit();
                
                Cart::destroy();
                return $this->sendResult(['message' => 'Thêm thành công'], 200);
            };
            
            DB::rollback();
            return $this->sendResult(['message' => 'Thêm sản phẩm thất bại'], 400);

        }catch(Exception $e) {
            DB::rollback();
            return $this->sendResult(['message' => 'Có lỗi xảy ra. Vui lòng liên hệ bộ phận trực tuyến để được hỗ trợ'], 500);
        }
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
    
    private function addProfile($data) {
        $result = Profile::create($data);

        if($result) {
            return $result->id;
        }

        return false;
    }

    private function handleInfoDistrict($district_id) {
        $data = District::with('city')->find($district_id);

        $info = [
            'district_id' => $data['id'],
            'city_id' => $data['city_id'],
            'shipping_price' => $data->city->price
        ];

        return $info;
    }

    private function createOrder($shipping_price, $order_profile_id, $message_user) 
    {
        $data = [
            'price' => Cart::priceTotal(null, null, ''),
            'shipping_price' => $shipping_price,
            'total' => Cart::priceTotal(null, null, '') + (int) $shipping_price,
            'order_profile_id' => $order_profile_id,
            'message_user' => $message_user
        ];

        $result =  Order::create($data);

        if($result) {
            return $result;
        }

        return false;
    }

    private function addOrderProduct($order)
    {
        foreach (Cart::content() as $item) {
            $result = $order->products()->attach($item->id, [
                'quantity' => $item->qty,
                'shape' => $item->options->shape,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        if(!$result) {
            return true;
        }

        return false;
    }

    public function addProduct(Request $request) {
        $product_id = $request['productId'];
        $qty = (int) $request['qty'];
       
        if($request['shape'] == 2 ) {
            $shape = 2;
        } else {
            $shape = 1;
        }

        $product = Product::where('id', $product_id)->where('is_status', 1)->first();
        
        if($product) {
            Cart::add($product_id, $product['name'], $qty, $product['sale_price'], 500, ['image' => $product['image'], 'shape' => $shape]);
            return $this->sendResult([
                'message' => 'Thêm thành công' , 
                'amount' => Cart::priceTotal('0', '0', ','). ' đ',
                'total' => Cart::content()->count(),
            ], 200);
        }

        return $this->sendResult(['message' => 'Thêm thất bại'], 400);
    }

    public function removeFromCart(Request $request)
    {
        $result = Cart::remove($request['rowId']);

        if(empty($result))
        {
            return $this->sendResult([
                'message' => 'Xóa thành công' , 
                'amount' => Cart::priceTotal('0', '0', ','). ' đ',
                'total' => Cart::content()->count(),
            ], 200);
        }

        return $this->sendResult(['message' => 'Xóa thất bại'], 400);
    }

    public function updateCart(Request $request)
    {
        $result = Cart::update($request['rowId'], ['qty' => $request['qty']]);

        if((boolean) $result)
        {
            return $this->sendResult([
                'status' => true, 
                'message' => 'Cập nhật thành công' , 
                'amount' => Cart::priceTotal('0', '0', ','). ' đ',
                'total' => Cart::content()->count(),
            ], 200);
        }

        return $this->sendResult(['message' => 'Cập nhật thất bại'], 400);
    }

    public function indexCart()
    {
        return view ('ui.cart.index');
    }
}
