<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Admin\City;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function anyData()
    {
        $data = City::query();

        return DataTables::of($data)
            ->editColumn('price', function ($data) {
                return number_format($data->price);
            })
            ->addColumn('action', function ($data) {
                return '<a href="' . route('cities.edit', $data['id']) . '"><em class="fas fa-edit"></em></a>';
            })
            ->rawColumns(['action', 'price'])
            ->make(true);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.city.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = City::find($id);

        return view('admin.city.edit', compact('data'));
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
        try {
            City::find($id)->update($request->all());
            return $this->sendResult(['message' => 'Tạo mới thành công'], 200);
        } catch (Exception $e) {
            return $this->sendResult(['message' => 'Tạo mới thất bại công'], 500);
        }
    }
}
