<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class PagesController extends Controller
{
    public function home() {
        $total_threads = Thread::count();
        $threads = Thread::orderBy('created_at','desc')->simplePaginate(5);
        return view('dashboard', compact('threads'), with(['total'=>$total_threads]));
    }
}
