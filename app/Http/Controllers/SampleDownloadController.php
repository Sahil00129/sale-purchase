<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleDownloadController extends Controller
{
    public function itemMasterSample()
    {
        $path = public_path('sample/itemMaster.csv');
        return response()->download($path);     
    }
    public function purchaseSample()
    {
      
        $path = public_path('sample/purchaseMaster.csv');
        return response()->download($path);
        
    }
    public function saleSample()
    {
      
        $path = public_path('sample/saleMaster.csv');
        return response()->download($path);
        
    }
    public function stockTransferSample()
    {
      
        $path = public_path('sample/stockTransfer.csv');
        return response()->download($path);
        
    }
    public function stockOpeningSample()
    {
      
        $path = public_path('sample/stockOpening.csv');
        return response()->download($path);
        
    }
    
}
