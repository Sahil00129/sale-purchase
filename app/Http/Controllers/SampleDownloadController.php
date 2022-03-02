<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleDownloadController extends Controller
{
    public function itemMasterSample()
    {
        $path = public_path('sample/item_master.csv');
        return response()->download($path);     
    }
    public function purchaseSample()
    {
      
        $path = public_path('sample/purchase.csv');
        return response()->download($path);
        
    }
    
}
