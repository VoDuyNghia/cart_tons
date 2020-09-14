<?php

namespace App\Http\Controllers\UI;

use App\Models\Admin\News;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    public function indexProduct($name, $id)
    {
        $dataProduct = Product::with('images')
            ->where('id', $id)
            ->where('is_status', 1)
            ->first();

        $dataProductRandom = $this->randomProduct($id);

        return view('ui.detail.index_product', compact('dataProduct', 'dataProductRandom'));
    }

    private function randomProduct($id)
    {
        return Product::select('id', 'name', 'price', 'sale_price', 'rate', 'image')
            ->where('is_status', 1)
            ->where('id', '<>', $id)
            ->inRandomOrder()
            ->limit(8)
            ->get();
    }

    public function indexNews($name, $id)
    {
        $dataNews = News::where('id', $id)
            ->where('is_status', 1)
            ->first();

        return view('ui.detail.index_news', compact('dataNews'));
    }
}
