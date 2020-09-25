<?php

namespace App\Http\Controllers\UI;

use Exception;
use App\Models\Admin\News;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Jenssegers\Agent\Agent;

class IndexController extends Controller
{
    public function index()
    {
        $dataProduct = $this->getProduct()->toArray();
        $dataNews = $this->getNews()->toArray();

        $agent = new Agent();

        return view('ui.index.index', compact('dataProduct', 'dataNews', 'agent'));
    }

    private function getProduct()
    {
        return Product::select('id', 'name', 'price', 'sale_price', 'rate', 'image')
            ->where('is_status', 1)
            ->orderBy('order','asc')
            ->orderBy('created_at','DESC')
            ->get();
    }

    private function getNews()
    {
        return News::select('id', 'name', 'detail', 'image')
            ->where('is_status', 1)
            ->orderBy('order','asc')
            ->orderBy('created_at','DESC')
            ->get();
    }

    public function indexAboutUs()
    {
        return view('ui.index.about_us');
    }

    public function indexContact()
    {
        return view('ui.index.contact_us');
    }

    public function getDataUser()
    {
        $dataProduct = Product::select('id', 'name')->where('is_status', 1)->get()->toArray();
        $number = count($dataProduct);
        
        $dataName = [
            "Nguyễn Thị Thạch",
            "Lưu Hoàng Việt",
            "Hoàng Thị Thanh",
            "Hoàng Phạm Khoa",
            "Lê Phương Mỹ",
            "Lê Hoàng",
            "Phan Trần Ngọc",
            "Nguyễn Vũ Gia",
            "Nguyễn Thanh",
            "Võ Thị Thu",
            "Đỗ Thị Thu",
            "Nguyễn Thị Thanh",
            "Trương Nguyên",
            "Lê Thị Khánh",
            "Lê Thị Nhi",
            "Lê Thị Ngọc",
        ];

        $dataPhone = [
            "****938212",
            "****327017",
            "****003981",
            "****555368",
            "****636243",
            "****818067",
            "****502845",
            "****384994",
            "****754454",
            "****659321",
            "****636589",
            "****623621",
            "****965212",
            "****032148",
            "****072148",
            "****963214",
        ];

        for($i = 0; $i <= 10; $i++) {
            $productId = rand(0, $number -1);
            
            $data[$i] = [
                "username" => $dataName[$i],
                "phone" => $dataPhone[$i],
                'product' => $dataProduct[$productId]['name'],
                'image' => '../images/products/default.png',
                'url' => route('ui.detail.index_product', getUrl($dataProduct[$productId]['name'], $dataProduct[$productId]['id']))
            ];
        }
        
        return Response::json($data);
    }
}
