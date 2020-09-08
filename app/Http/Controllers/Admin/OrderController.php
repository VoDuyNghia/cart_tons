<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Models\Admin\District;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{

    public function __construct(Order $order)
    {
        $this->order = $order;

        $statusOrder = $this->order->getOptionStatus();
        $labelStauts = $this->order->getListStatusWithBootstrapLabels();

        View::share('statusOrder', $statusOrder);
        View::share('labelStauts', $labelStauts);
    }
       
    public function anyData()
    {
        $data = $this->order->with('profile');

        return DataTables::of($data)
            ->editColumn('price', function($data) {
                return number_format($data->price);
            })
            ->editColumn('shipping_price', function($data) {
                return number_format($data->shipping_price);
            })
            ->editColumn('total', function($data) {
                return number_format($data->total);
            })
            ->editColumn('status', function($data) {
                return $this->order->getListStatusWithBootstrapLabels()[$data->status];
            })
            ->editColumn('created_at', function($data) {
                return $data->created_at;
            })
            ->addColumn('action', function ($data) {
                return 
                '<a href="' . route('orders.show', $data['id']) . '"><em class="fas fa-search"></em></a>';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function index()
    {
        return view ('admin.order.index');
    }

    public function show($id)
    {
        $data = $this->order->with(['profile', 'products'])->find($id)->toArray();

        $dataDistrict = District::with('city')->find($data['profile']['district_id'])->toArray();

        return view ('admin.order.detail', compact('data', 'dataDistrict'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('status', 'message_user', 'message_admin');

        try {
            $this->order->find($id)->update($data);
        
            return $this->sendResult(['message' => 'Cập nhật thành công'], 200);
        } catch (Exception $e) {
            return $this->sendResult(['message' => 'Cập nhật thất bại công'], 500);
        }
    }
}
