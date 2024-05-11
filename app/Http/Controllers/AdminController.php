<?php

namespace App\Http\Controllers;

use App\Models\Category_master;
use App\Models\Exam_master;
use App\Models\Materi;
use App\Models\Question_master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        // Set default value for $userRole
        $userRole = null;

        // Check if the user is authenticated
        if(auth()->check()) {
            $userRole = auth()->user()->role;
        }

        return view('admin.dashboard', compact('userRole'));
    }

    public function kategori(){

        $data['category']=Category_master::get()->toArray();
        return view('admin.kategori',$data);
    }

    public function tambahkategori(Request $request){

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

    public function editkategori(Request $request){
        $cat = Category_master::where('id',$request->id)->get()->first();
        $cat->name = $request->name;
        $cat->update();
        return redirect(url('kategori'));
    }

    public function hapusKategori($id){

        $cat = Category_master::where('id',$id)->get()->first();
        $cat->delete();
        return redirect(url('kategori'));
    }

    public function kuismaster()
    {
        $data['category']=Category_master::where('status','1')->get()->toArray();
        $data['exams']=Exam_master::select(['exam_masters.*','categories_masters.name as cat_name'])->join('categories_masters','exam_masters.category','=','categories_masters.id')->get()->toArray();
        return view('admin.kuismaster',$data);
    }

    public function tambahkuis(Request $request){
        $validator = Validator::make($request->all(),['title'=>'required','exam_date'=>'required','exam_category'=>'required',
        'exam_duration'=>'required']);

        if($validator->fails()){
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        else{

            $exam = new Exam_master();
            $exam->title = $request->title;
            $exam->exam_date = $request->exam_date;
            $exam->exam_duration = $request->exam_duration;
            $exam->category = $request->exam_category;
            $exam->status = 1;
            $exam->save();

            $arr = array('status'=>'true','message'=>'exam added successfully','reload'=>url('kuismaster'));

        }

        return redirect(url('kuismaster'));
    }

    public function editKuis(Request $request){

        $exam = Exam_master::where('id',$request->id)->get()->first();
        $exam->title = $request->title;
        $exam->exam_date = $request->exam_date;
        $exam->category = $request->exam_category;
        $exam->exam_duration = $request->exam_duration;

        $exam->update();

        return redirect(url('kuismaster'));

    }

    public function hapusKuis($id){
        $exam1 = Exam_master::where('id',$id)->get()->first();
        $exam1->delete();
        return redirect(url('kuismaster'));
    }

    public function tambahPertanyaan($id){

        $data['questions']=Question_master::where('exam_id',$id)->get()->toArray();
        return view('admin.addExam',$data);
    }

    public function tambahPertanyaanBaru(Request $request){

        $validator = Validator::make($request->all(),[
            'question'=>'required',
            'option_1'=>'required',
            'option_2'=>'required',
            'option_3'=>'required',
            'option_4'=>'required',
            'ans'=>'required'
        ]);

        if($validator->fails()){
            $arr = array('status'=>'flase','message'=>$validator->errors()->all());

        }else{

            $q = new Question_master();
            $q->exam_id=$request->exam_id;
            $q->questions=$request->question;

            if($request->ans=='option_1'){
                $q->ans=$request->option_1;
            }elseif($request->ans=='option_2'){
                $q->ans=$request->option_2;
            }elseif($request->ans=='option_3'){
                $q->ans=$request->option_3;
            }else{
                $q->ans=$request->option_4;
            }



            $q->status=1;
            $q->options=json_encode(array('option1'=>$request->option_1,'option2'=>$request->option_2,'option3'=>$request->option_3,'option4'=>$request->option_4));

            $q->save();
        }

        return redirect(url('kuismaster/tambahpertanyaan/'.$request->exam_id));
    }

    public function editPertanyaanBaru(Request $request){

        $q=Question_master::where('id',$request->id)->get()->first();

        $q->questions = $request->question;

        if($request->ans=='option_1'){
            $q->ans=$request->option_1;
        }elseif($request->ans=='option_2'){
            $q->ans=$request->option_2;
        }elseif($request->ans=='option_3'){
            $q->ans=$request->option_3;
        }else{
            $q->ans=$request->option_4;
        }

        $q->options = json_encode(array('option1'=>$request->option_1,'option2'=>$request->option_2,'option3'=>$request->option_3,'option4'=>$request->option_4));

        $q->update();

        return redirect(url('kuismaster/tambahpertanyaan/'.$q->exam_id));

    }

    public function hapusPertanyaanBaru($id){

        $q=Question_master::where('id',$id)->get()->first();
        $exam_id = $q->exam_id;
        $q->delete();

        return redirect(url('kuismaster/tambahpertanyaan/'.$exam_id));
    }

    public function materi(){
        $materi = Materi::get();
        $category = Category_master::where('status','1')->get()->toArray();
        return view('admin.materimaster', compact('materi', 'category'));
    }
    public function tambahMateri(){
        $category = Category_master::where('status','1')->get()->toArray();
        return view('admin.tambahmateri', compact('category'));
    }
    public function storeMateri(Request $request){
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

}
