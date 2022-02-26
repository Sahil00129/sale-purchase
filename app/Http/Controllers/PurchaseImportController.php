<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientSites;
use App\Models\MonthlyPurchase;
use App\Imports\PurchaseImport;
use Maatwebsite\Excel\Facades\Excel;
use Response;

class PurchaseImportController extends Controller
{

    public function purchaseImportView()
    {
        $clients = ClientSites::select('client')->distinct()->get();
        $identitys = ClientSites::select('identity')->distinct()->get();
        return view('purchase pages.purchaseImport-Data',['clients' => $clients, 'identitys' => $identitys]);
    }

    public function purchaseImportData()
    {
       // echo'<pre>'; print_r($_FILES); die; 
       if($_POST['p_type'] == 1){
        try
        {    
            $identity = $_POST['identity'];
            $client = $_POST['client'];
            $data = Excel::import(new PurchaseImport, request()->file('file'));         
           // $response['import_type'] = $type;
            $response['success'] = true;
            $response['messages'] = 'Succesfully imported';
            return Response::json($response);

          }catch (\Exception $e) {
             $response['success'] = false;
             $response['messages'] = 'something wrong';
             return Response::json($e);
        }
    }elseif($_POST['p_type'] == 2){

        try
        {    
             $identity = $_POST['identity'];
             $client = $_POST['client'];
             $data = Excel::import(new PurchaseImport, request()->file('file'));         
             //$response['import_type'] = $type;
             $response['success'] = true;
             $response['messages'] = 'Succesfully imported';
            return Response::json($response);
        
          }catch (\Exception $e) {
             $response['success'] = false;
             $response['messages'] = 'something wrong';
             return Response::json($e);
        }
    }
    }
    
    
}
