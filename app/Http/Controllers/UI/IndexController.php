<?php

namespace App\Http\Controllers\UI;

use Exception;
use App\Models\Admin\News;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class IndexController extends Controller
{
    public function index()
    {
        $dataProduct = $this->getProduct()->toArray();
        $dataNews = $this->getNews()->toArray();

        return view('ui.index.index', compact('dataProduct', 'dataNews'));
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
}
