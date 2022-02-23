<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

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
        $latestsale =  DB::table('sale_data')->latest('bill_date')->where('client','Fmc')->first();
        $latestpurchase =  DB::table('purchase_data')->latest('bill_date')->where('client','Fmc')->first();
        $latesttransfer =  DB::table('stock_transfer')->latest('bill_date')->where('client','Fmc')->first();
        return view('pages.dashboard',['latestsale' => $latestsale, 'latestpurchase' => $latestpurchase, 'latesttransfer' => $latesttransfer]);
    }

    public function maintenance()
    {
        return view('pages.maintenance');
    }
}
