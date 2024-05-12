<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
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

        return view('dashboard', compact('userRole', 'materi'));
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

        return view('kuis.kuis', compact('userRole'));
    }
    public function kelas(){
        // Set default value for $userRole
        $userRole = null;

        // Check if the user is authenticated
        if(auth()->check()) {
            $userRole = auth()->user()->role;
        }

        return view('kelas.kelas', compact('userRole'));
    }
}
