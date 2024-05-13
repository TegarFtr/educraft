<?php

namespace App\Http\Controllers;

use App\Models\Exam_master;
use App\Models\Hasilkuis;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Question_master;
use App\Models\User;
use App\Models\UserKelas;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Strings;
use PhpParser\Node\Expr\Cast\String_;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class MuridController extends Controller
{
    public function dashboard(){
        // Set default value for $userRole
        $userRole = null;

        // Check if the user is authenticated
        if(auth()->check()) {
            $userRole = auth()->user()->role;
        }

        $materi = Materi::get();
        $kuis =  Exam_master::get();
        return view('dashboard', compact('userRole', 'materi', 'kuis'));
    }

    public function aktivitas(){
        // Set default value for $userRole
        $userRole = null;

        // Check if the user is authenticated
        if(auth()->check()) {
            $userRole = auth()->user()->role;
        }

        return view('aktivitas.aktivitas', compact('userRole'));
    }
    public function materi(){
        // Set default value for $userRole
        $userRole = null;

        // Check if the user is authenticated
        if(auth()->check()) {
            $userRole = auth()->user()->role;
        }
        $materi = Materi::get();
        return view('materi.materi', compact('userRole', 'materi'));
    }
    public function bacamateri(string $id){
        // Set default value for $userRole
        $userRole = null;

        // Check if the user is authenticated
        if(auth()->check()) {
            $userRole = auth()->user()->role;
        }
        $materi = Materi::findOrFail($id);
        return view('materi.bukamateri', compact('userRole', 'materi'));
    }
    public function viewPDF($id)
    {
        $materi = Materi::findOrFail($id);

        $filePath = public_path($materi->file); // Change storage_path() to public_path()

        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        return response()->file($filePath, [
            'Content-Type' => 'application/pdf'
        ]);
    }


    public function kuis(){
        // Set default value for $userRole
        $userRole = null;

        // Check if the user is authenticated
        if(auth()->check()) {
            $userRole = auth()->user()->role;
        }
        $kuis =  Exam_master::get();
        return view('kuis.kuis', compact('userRole', 'kuis'));
    }
    public function startkuis(string $id){
        // Set default value for $userRole
        $userRole = null;

        // Check if the user is authenticated
        if(auth()->check()) {
            $userRole = auth()->user()->role;
        }
        $question= Question_master::where('exam_id',$id)->get();

        $exam=Exam_master::where('id',$id)->get()->first();
        return view('kuis.mulaikuis', compact('userRole', 'question', 'exam'));
    }

    public function submit_questions(Request $request){

        $yes_ans=0;
        $no_ans=0;
        $data= $request->all();
        $result=array();
        for($i=1;$i<=$request->index;$i++){

            if(isset($data['question'.$i])){
                $q=Question_master::where('id',$data['question'.$i])->first();

                if($q->ans==$data['ans'.$i]){
                    $result[$data['question'.$i]]='YES';
                    $yes_ans++;
                }else{
                    $result[$data['question'.$i]]='NO';
                    $no_ans++;
                }
            }
        }


        $res = new Hasilkuis();
        $res->exam_id=$request->exam_id;
        $res->user_id = Auth::id(); // Menggunakan session() dari Request
        $res->yes_ans=$yes_ans;
        $res->no_ans=$no_ans;
        $res->result_json=json_encode($result);

        $res->save(); // Tidak perlu echo di sini
        return redirect(url('kuis/lihathasil/' . $request->exam_id));
    }


    public function view_result($id){

        // Set default value for $userRole
        $userRole = null;

        // Check if the user is authenticated
        if(auth()->check()) {
            $userRole = auth()->user()->role;
        }

        $data['result_info'] = Hasilkuis::where('exam_id',$id)->where('user_id',Auth::id())->get()->first();

        $data['student_info'] = User::where('id',Auth::id())->get()->first();

        $data['exam_info']= Exam_master::where('id',$id)->get()->first();

        return view('kuis.hasilkuis',$data, compact('userRole'));
    }

    public function kelas(){
        // Set default value for $userRole
        $userRole = null;

        // Check if the user is authenticated
        if(auth()->check()) {
            $userRole = auth()->user()->role;
        }

        $kelas = UserKelas::get()->where('user_id', Auth::id())->first();
        $kode_kelas = $kelas->kode_kelas;
        $materi = Materi::get()->where('kelas', $kode_kelas)->all();
        $kuis = Exam_master::get()->where('kelas', $kode_kelas)->all();
        return view('kelas.kelas', compact('userRole', 'kelas', 'materi', 'kuis'));
    }

    public function joinKelas (Request $request)
    {
        $request->validate([
            'kode_kelas' => 'required|string|max:255',
        ]);

        // Cek apakah kode kelas tersedia dalam database
        $kelas = Kelas::where('kode_kelas', $request->kode_kelas)->first();

        if ($kelas) {
            $user = UserKelas::get()->where('user_id', Auth::id())->first();
            if (!$user) {
                $kelas = new UserKelas();
                $kelas->user_id = Auth::id();
                $kelas->kode_kelas = $request->kode_kelas;
                $kelas->save();
            } else {
                return redirect()->back()->with('error', 'Anda Sudah Masuk ke Kelas');
            }
        } else {
            // Lakukan sesuatu jika kode kelas tidak valid
            return redirect()->back()->with('error', 'Kode kelas tidak valid.');
        }

        return redirect(url('kelas'));
    }
}
