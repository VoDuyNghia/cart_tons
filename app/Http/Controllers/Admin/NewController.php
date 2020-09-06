<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Admin\News;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class NewController extends Controller
{
    public function __construct(News $news)
    {
        $this->news = $news;
    }
    
    public function anyData()
    {
        $data = News::query();

        return DataTables::of($data)
            ->editColumn('image', function($data) {
                return '<img src="'.getImage($data->image, 'news').'" width="100px" class="img-thumbnail">';
            })
            ->editColumn('status', function ($data) {
                $status = $data->is_status == 1 ? "unlock" : "ban";

                return '<em class="fa fa-' . $status . ' text-black"> ' . strtoupper($status) . ' </em>';
            })
            ->addColumn('action', function ($data) {
                return 
                '<a href="' . route('news.edit', $data['id']) . '"><em class="fas fa-edit"></em></a> ||' .
                '<a href="javascript:void(0);" data-role="remove" title="Xóa bài viết" data-text="Bạn có muốn chắc chắn xóa bài viết " data-name="' . $data->name . '" data-url="' . route('news.destroy', $data->id) . '"><em class="fas fa-times"></em></a>';
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
        return view ('admin.news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.news.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['description', 'name', 'is_status', 'detail', 'image', 'order']);
        $data['is_status'] = $this->handleIsStatus($data['is_status']);

        if (!isset($data['image'])) {
            $data['image'] = null;
        } else {
            $file = $data['image'];
            $data['image'] = createImageName($data['image']->extension());
        }

        try {
            $this->news->create($data);

            if (isset($data['image'] )) {
                storeImage($file, 'news', $data['image'] );
            }

            return $this->sendResult(['message' => 'Tạo mới thành công'], 200);
        } catch (Exception $e) {
            return $this->sendResult(['message' => 'Tạo mới thất bại công'], 500);
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
        $data = $this->news->find($id);

        return view ('admin.news.edit', compact('data'));
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
        $dataNews = $this->news->find($id);
        $data = $request->only(['description', 'name', 'is_status', 'detail', 'image', 'order']);
        $data['is_status'] = $this->handleIsStatus($data['is_status']);

        if (isset($data['image'])) {
            $status = true;
            $file = $data['image'];
            $data['image'] = createImageName($data['image']->extension());
        } else {
            $status = false;
            $data['image'] = $dataNews['image'];
        }

        try {
            $this->news->find($id)->update($data);

            if ($status) {
                deleteImage($dataNews['image']);
                storeImage($file, 'news', $data['image']);
            }

            return $this->sendResult(['message' => 'Cập nhật thành công'], 200);
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
        $dataNews = $this->news->find($id);

        try {
            $this->news->find($id)->delete();
            deleteImage($dataNews['image']);
            
            return $this->sendResult(['message' => 'Xóa thành công'], 200);
        } catch (Exception $e) {
            return $this->sendResult(['message' => 'Xóa thất bại'], 500);
        }
    }
}
