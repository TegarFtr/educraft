<?php

namespace App\Http\Controllers;

use App\Models\Category_master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['category']=Category_master::get()->toArray();
        $userRole = auth()->user()->role;
        return view('admin.kategori',$data, compact('userRole'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails()){
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        else{

            $cat = new Category_master();
            $cat->name = $request->name;
            $cat->status = 1;
            $cat->save();
            $arr=array('status'=>'true','message'=>'Success','reload'=>url('admin/exam_category'));
        }
        return redirect(url('kategori'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $cat = Category_master::where('id',$request->id)->get()->first();
        $cat->name = $request->name;
        $cat->update();
        return redirect(url('kategori'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Category_master::where('id',$id)->get()->first();
        $cat->delete();
        return redirect(url('kategori'));
    }
}
