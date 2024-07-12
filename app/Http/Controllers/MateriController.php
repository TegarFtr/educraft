<?php

namespace App\Http\Controllers;

use App\Models\Category_master;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::get();
        $category = Category_master::where('status','1')->get()->toArray();
        $userRole = auth()->user()->role;
        return view('admin.materimaster', compact('materi', 'category', 'userRole'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userRole = auth()->user()->role;
        $category = Category_master::where('status','1')->get()->toArray();
        return view('admin.tambahmateri', compact('category', 'userRole'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'sampul' => 'required',
            'akses' => 'required',
            'kelas' => 'nullable',
            'filemateri' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->errors()->first());
        }

        $requestData = $request->all();

        // Validate and store the image/sampul
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

        if ($request->hasFile('filemateri')) {
            $fileName = time() . "-" . $request->file('filemateri')->getClientOriginalName();
            $path = $request->file('filemateri')->storeAs('filemateri', $fileName, 'public');
            $requestData["filemateri"] = '/storage/' . $path;
        } else {
            // Handle the case where no file is uploaded
            return redirect()
                ->back()
                ->withInput()
                ->withErrors('Please upload a valid file for the filemateri.');
        }

        $requestData['title'] = $request->title;
        $requestData['deskripsi'] = $request->deskripsi;
        $requestData['category'] = $request->kategori;
        $requestData['file'] = $requestData["filemateri"];
        $requestData['akses'] = $request->akses;
        $requestData['kelas'] = $request->kelas;

        unset($requestData['filemateri']);

        Materi::create($requestData);

        return redirect(url('materimaster'))->with('success', 'Materi berhasil ditambahkan!');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
