<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function aktivitas(){
        // Set default value for $userRole
        $userRole = null;

        // Check if the user is authenticated
        if(auth()->check()) {
            $userRole = auth()->user()->role;
        }

        return view('aktivitas.selesai', compact('userRole'));
    }
}
