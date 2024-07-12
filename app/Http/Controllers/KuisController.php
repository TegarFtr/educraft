<?php

namespace App\Http\Controllers;

use App\Models\Category_master;
use App\Models\Exam_master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userRole = auth()->user()->role;
        $data['category']=Category_master::where('status','1')->get()->toArray();
        $data['exams']=Exam_master::select(['exam_masters.*','categories_masters.name as cat_name'])->join('categories_masters','exam_masters.category','=','categories_masters.id')->get()->toArray();
        return view('admin.kuismaster',$data, compact('userRole'));
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
        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'exam_date'=>'required',
            'category'=>'required',
            'exam_duration'=>'required',
            'akses' => 'required',
            'sampul' => 'required',
            'kelas' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->errors()->first());
        }

        $requestData = $request->all();

        if ($request->hasFile('sampul')) {
            $fileName = time() . "-" . $request->file('sampul')->getClientOriginalName();
            $path = $request->file('sampul')->storeAs('sampul', $fileName, 'public');
            $requestData["sampul"] = '/storage/' . $path;
        } else {
            // Handle the case where no file is uploaded
            return redirect()
                ->back()
                ->withInput()
                ->withErrors('Please upload a valid file for the sampul.');
        }

        // Assigning values directly from the request
        $requestData["status"] = 1;

        Exam_master::create($requestData);

        return redirect(url('kuismaster'));
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
        $exam = Exam_master::where('id',$request->id)->get()->first();
        $exam->title = $request->title;
        $exam->exam_date = $request->exam_date;
        $exam->category = $request->exam_category;
        $exam->exam_duration = $request->exam_duration;

        $exam->update();

        return redirect(url('kuismaster'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exam1 = Exam_master::where('id',$id)->get()->first();
        $exam1->destroy();
        return redirect(url('kuismaster'));
    }
}
