<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    public function anyData()
    {
        $data = Banner::query();

        return DataTables::of($data)
            ->editColumn('name', function ($data) {
                return '<a target="_blank" href="'.asset('images/description/'.$data->demo).'" target="_blank">'.$data->name.'</a>';
            })
            ->editColumn('image', function ($data) {
                return "<img width='200px' src='".getImage($data->image, 'banners')."'>";
            })
            ->addColumn('action', function ($data) {
                return '<a href="' . route('banners.edit', $data['id']) . '"><em class="fas fa-edit"></em><a>';
            })
            ->rawColumns(['action', 'name', 'link', 'image'])
            ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = Banner::find($id);

        return view('admin.banner.edit', compact('data'));
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
        $dataBanner = $this->banner->find($id);
        $data = $request->only('link', 'image');

        if (isset($data['image'])) {
            $status = true;
            $file = $data['image'];
            $data['image'] = createImageName($data['image']->extension());
        } else {
            $status = false;
            $data['image'] = $dataBanner['image'];
        }

        try {
            $result = $this->banner->find($id)->update($data);

            if($result) {

                if ($status) {
                    deleteImage($dataBanner['image']);
                    storeImage($file, 'banners', $data['image']);
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
        //
    }
}
