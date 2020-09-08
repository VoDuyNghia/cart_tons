<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    const TEXT = 'text';
    const COLOR = 'color';
    const TOTAL = 'total';
    const ICON = 'icon';

    public function __construct(Order $order, Product $product)
    {
        $this->order = $order;
        $this->product = $product;
    }
    
    public function dashboad()
    {
        $data = $this->numberStatistics();

        return view('admin.dashboard.index', compact('data'));
    }

    private function numberStatistics()
    {
        $data  = [
            'balance' => [
                self::TEXT => 'TỔNG DOANH THU',
                self::COLOR => 'red',
                self::TOTAL => number_format($this->order->totalBalance()),
                self::ICON => 'fa fa-money-bill',
            ],

            'customer' => [
                self::TEXT => 'TỔNG SẢN PHẨM',
                self::COLOR => 'blue',
                self::TOTAL => $this->product->where('is_status', 1)->count(),
                self::ICON => 'ni ni-user-run', 
            ],

            'earning_rule' => [
                self::TEXT => 'ĐƠN HÀNG ĐÃ DUYỆT',
                self::COLOR => 'green',
                self::TOTAL => $this->order->totalOrder(4),
                self::ICON => 'fas fa-plus-square',
            ],

            'campaign' => [
                self::TEXT => 'ĐƠN HÀNG CHỜ DUYỆT',
                self::COLOR => 'gray',
                self::TOTAL => $this->order->totalOrder(1),
                self::ICON => 'fas fa-minus-square',
            ],
        ];

        return $data;
    }

    public function dataByDay()
    {
        return $this->order->StatisticByDate();
    }

    public function dataByMonth(Request $request)
    {
        $year = $request->get('year');

        $month = date('Y') == $year ? (int) date('m') : '12';

        return $this->order->StatisticByMonth($month, $year);
    }
}
