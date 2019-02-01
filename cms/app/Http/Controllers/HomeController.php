<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; // テスト中

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // original
        // return view('home');
        
        // ver.2
        // return view('index');

        // テスト中
        $items = DB::table('items')
            ->join('users','items.user_id','=','users.id')
            ->select('items.*', 'users.name as user_name', 'users.prof_img as prof_img')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
            //->get();
        return view('index', [
            'items' => $items,
        ]);
    }
}
