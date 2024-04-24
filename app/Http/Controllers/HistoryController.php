<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
		return view('history.index');
	}
    public function detail(){
		return view('history.detail');
	}
}
