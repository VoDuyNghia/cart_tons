<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use App\Models\Admin\Product;
use App\Models\Admin\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Order extends Model
{
    const IS_PENDING = 1;
    const IS_PROCESSING = 2;
    const IS_SHIPPING = 3;
    const IS_SUCCESS = 4;
    const IS_CANCELED = 5;

    protected $fillable = [
        'status', 'price', 'shipping_price', 'total', 'order_profile_id', 'message_user', 'message_admin'
    ];

    public static function getListStatusWithBootstrapLabels()
    {
        return [
            self::IS_PENDING => sprintf('<span class="badge badge-warning">%s</span>', 'CHỜ XỬ LÝ'),
            self::IS_PROCESSING => sprintf('<span class="badge badge-primary">%s</span>', 'ĐANG XỬ LÝ'),
            self::IS_SHIPPING => sprintf('<span class="badge badge-dark">%s</span>', 'ĐANG GIAO HÀNG'),
            self::IS_SUCCESS => sprintf('<span class="badge badge-success">%s</span>', 'THÀNH CÔNG'),
            self::IS_CANCELED => sprintf('<span class="badge badge-danger">%s</span>', 'HỦY ĐƠN'),
        ];
    }

    public static function getOptionStatus()
    {
        return [
            self::IS_PENDING => trans('CHỜ XỬ LÝ'),
            self::IS_PROCESSING => trans('ĐANG XỬ LÝ'),
            self::IS_SHIPPING => trans('ĐANG GIAO HÀNG'),
            self::IS_SUCCESS => trans('THÀNH CÔNG'),
            self::IS_CANCELED => trans('HỦY ĐƠN'),
        ];
    }

    /**
     * Get user having this order
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'order_profile_id', 'id');
    }

    /**
     * Get products list of this order
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function totalBalance()
    {
        return Order::select(DB::raw('status as status'), DB::raw('sum(total) as total'))
            ->where('status', self::IS_SUCCESS)
            ->groupBy('status')
            ->first()
            ->toArray()['total'];
    }

    public function totalOrder($status)
    {
        return Order::where('status', $status)->count();
    }

    public function StatisticByDate()
    {
        $day = 20;

        $result['adding'] = Order::select(
            DB::raw('DATE(created_at) as label'),
            DB::raw('sum(total) as point')
        )
            ->where('status', 4)
            ->whereBetween(DB::raw('DATE(created_at)'), [Carbon::now()->subDays($day), Carbon::now()])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderByDESC('created_at')
            ->get();

        $data['adding'] = $result['adding']->toArray();
        $data['adding'] = $this->handleDataStatisticsDay($data['adding'], $day);
        
        return $data;
    }

    public function StatisticByMonth($month, $year)
    {
        $result['adding'] = Order::select(
            DB::raw('Month(created_at) as month'),
            DB::raw('sum(total) as point')
        )
            ->where('status', 4)
            ->whereBetween(DB::raw('Month(created_at)'), [1, 12])
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('Month(created_at)'))
            ->orderBy('created_at', 'asc')
            ->get();

        $data['adding'] = $result['adding']->toArray();
        $data['adding'] = $this->handleDataStatisticsMonth($data['adding'], $month);

        return $data;   
    }
    
    private function handleDataStatisticsDay($data, $total_day)
    {
        for ($i = 0; $i < $total_day; $i++) {
            if (!isset($data[$i]) || ($data[$i]['label'] <> Carbon::now()->subDays($i)->format('Y-m-d'))) {
                $newData = [
                    'label' => Carbon::now()->subDays($i)->format('Y-m-d'),
                    'point' => 0,
                ];
                array_splice($data, $i, 0, [$newData]);
            }
        }

        return $data;
    }

    private function handleDataStatisticsMonth($data, $month)
    {
        for ($i = 0; $i < $month; $i++) {
            if (!isset($data[$i]) || ($data[$i]['month'] <> $i + 1)) {
                $newData = [
                    'month' => $i + 1,
                    'point' => 0,
                ];
                array_splice($data, $i, 0, [$newData]);
            }
        }

        return $data;
    }
}
