<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Soal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index (){

        return view('admin.dashboard');
    }
    public function user (){
        $soal = Soal::all();
        $materi = Materi::all();
        return view('welcome', compact('materi', 'soal'));
    }
}
