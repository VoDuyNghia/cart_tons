<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Image;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct(Product $product, Image $image)
    {
        $this->product = $product;
        $this->image = $image;
    }

    public function anyData()
    {
        $data = $this->product->query();

        return DataTables::of($data)
            ->editColumn('price', function($data) {
                return number_format($data->price);
            })
            ->editColumn('sale_price', function($data) {
                return number_format($data->sale_price);
            })
            ->editColumn('image', function($data) {
                return '<img src="'.getImage($data->image, 'products').'" width="100px" class="img-thumbnail">';
            })
            ->editColumn('status', function ($data) {
                $status = $data->is_status == 1 ? "unlock" : "ban";

                return '<em class="fa fa-' . $status . ' text-black"> ' . strtoupper($status) . ' </em>';
            })
            ->addColumn('action', function ($data) {
                return 
                '<a href="' . route('products.edit', $data['id']) . '"><em class="fas fa-edit"></em></a> ||' .
                '<a href="javascript:void(0);" data-role="remove" title="Xóa bài viết" data-text="Bạn có muốn chắc chắn xóa bài viết " data-name="' . $data->name . '" data-url="' . route('products.destroy', $data->id) . '"><em class="fas fa-times"></em></a>';
            })
            ->rawColumns(['action', 'image', 'status'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'detail', 'description', 'rate', 'image',  'price', 'sale_price', 'order', 'is_status', 'image_detail');

        $data['is_status'] = $this->handleIsStatus(isset($data['is_status']) ? 'on' : 'off');

        if (!isset($data['image'])) {
            $data['image'] = null;
        } else {
            $file = $data['image'];
            $data['image'] = createImageName($data['image']->extension());
        }

        try {
            $result = $this->product->create($data);

            if($result) {
                
                if (isset($data['image'] )) {
                    storeImage($file, 'products', $data['image'] );
                }

                $this->uploadMultiImage($data['image_detail'],  $result->id);

                return $this->sendResult(['message' => 'Tạo mới thành công!'], 200);

            }

            return $this->sendResult(['message' => 'Lỗi người dùng'], 400);

        } catch (Exception $e) {
            echo $e;
            return $this->sendResult(['message' => 'Tạo mới thất bại!'], 500);
        }
    }

    private function uploadMultiImage($arrayImage, $product_id) {
        foreach ($arrayImage as $key => $value) {
            $file = $value;
            $data['path'] = createImageName($value->extension());
            $data['product_id'] = $product_id;

            storeImage($file, 'details',$data['path']);
            $this->image->create($data);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->product->find($id);
        $dataImage = $this->image->where('product_id', $id)->get();

        return view ('admin.product.edit', compact('data', 'dataImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataProduct = $this->product->find($id);
        $data = $request->only('name', 'detail', 'description', 'rate', 'image',  'price', 'sale_price', 'order', 'is_status', 'image_detail');
        $data['is_status'] = $this->handleIsStatus(isset($data['is_status']) ? 'on' : 'off');

        if (isset($data['image'])) {
            $status = true;
            $file = $data['image'];
            $data['image'] = createImageName($data['image']->extension());
        } else {
            $status = false;
            $data['image'] = $dataProduct['image'];
        }

        try {
            $result = $this->product->find($id)->update($data);

            if($result) {

                if(isset($data['image_detail'])) {
                    $this->uploadMultiImage($data['image_detail'], $id);
                }

                if ($status) {
                    deleteImage($dataProduct['image']);
                    storeImage($file, 'products', $data['image']);
                }

                return $this->sendResult(['message' => 'Cập nhật thành công'], 200);
            }

            return $this->sendResult(['message' => 'Lỗi Người Dùng'], 400);

        } catch (Exception $e) {
            return $this->sendResult(['message' => 'Cập nhật thất bại công'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataProduct = $this->product->find($id);

        try {
            $this->product->find($id)->delete();
            deleteImage($dataProduct['image']);
            
            return $this->sendResult(['message' => 'Xóa thành công'], 200);
        } catch (Exception $e) {
            return $this->sendResult(['message' => 'Xóa thất bại'], 500);
        }
    }

    public function deleteImage($id) {
        $dataImage = $this->image->find($id);

        try {
            $this->image->find($id)->delete();
            deleteImage($dataImage['path']);
            
            return $this->sendResult(['message' => $id], 200);
        } catch (Exception $e) {
            return $this->sendResult(['message' => 'Xóa thất bại'], 500);
        }
    }
}
