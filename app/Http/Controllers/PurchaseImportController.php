<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientSites;
use App\Models\MonthlyPurchase;
use App\Models\DailybasePurchase;
use App\Imports\PurchaseImport;
use Maatwebsite\Excel\Facades\Excel;
use Response;
use DB;

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
            $identity = $_POST['month_year'];
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
     
   public function finalTableView()

   {

    $sites = DB::table('identity_client_sites')->select('sites')->distinct()->get();
    $identitys = DB::table('identity_client_sites')->select('identity')->distinct()->get();
    $clients = DB::table('identity_client_sites')->select('client')->distinct()->get();
    $group = DB::table('item_master')->select('group')->distinct()->get();
    return view('purchase pages.finalCalculation-Table',['clients' => $clients, 'identitys' => $identitys,'sites' => $sites,'list' => $group]);
   }

   public function finalTableCalculation()
   {
    try
    {
       $identity = $_POST['identity'];
       $client = $_POST['client'];
       $sites = $_POST['sites'];
       $group = $_POST['group'];
       $date_calender = $_POST['date_calender'];
       //echo'<pre>'; print_r($date_calender); die;
       $list =  DB::table('item_master')->where('group', $_POST['group'])->get();
       $rs = $list->toArray();
       $new = json_decode(json_encode($rs), true);
       //echo'<pre>'; print_r($ne); die;
       //$items = array();
       //$items[] = $ne;
       //echo'<pre>'; print_r($items); die;  
      foreach($new as $item){
            //echo'<pre>'; print_r($item['item_name']); die;
            $getGrp =  DB::table('item_master')->select('item_name')->where('group',  $group)->get();;
            //echo "<pre>"; print_r($getGrp);die;    
            $rs = json_decode(json_encode($getGrp), true);
            $getGP = call_user_func_array('array_merge', $rs); 
            //echo'<pre>'; print_r($getGP); die;
            
           $monthlyPurchase = MonthlyPurchase::where('item_name', $item['item_name'])->where('sites', $sites)->where('identity',$identity)->where('client',$client)->whereDate('created_at', '<=',  $date_calender)->latest()->first();
          // echo'<pre>'; print_r($monthlyPurchase); die;
           $dailyBases = DailybasePurchase::where('item_name', $item['item_name'])->where('sites', $sites)->where('identity',$identity)->where('client',$client)->where('created_at', $date_calender)->first();
           //echo'<pre>'; print_r($dailyBases); die;
            $month = json_decode(json_encode($monthlyPurchase), true);
            //echo'<pre>'; print_r($month); die;
            $daily = json_decode(json_encode($dailyBases), true);
            $allinone = array_merge($month, $daily);
           //echo'<pre>'; print_r($res); die;
           //$allinone = call_user_func_array('array_merge', $res); 
           
     /**********************************Calculation Start****************************************** */
            $stockCover = $allinone['stock_in_hand'] + $allinone['stock_in_transit'] + $allinone['mtd_sales'];

            $y = $stockCover / ($allinone['df'] + $allinone['add_adf']) * 100;
            $stockCoverDemand = round($y, 0) . '%';

            $balanceDF = ($allinone['df'] + $allinone['add_adf']) - $stockCover;

            $in = ($allinone['stock_in_hand'] + $allinone['stock_in_transit']) / $balanceDF - 30 ;
            $inventoryCovering = number_format( $in, 2 ) . '%';
            $flg[] = $inventoryCovering;
            //echo'<pre>'; print_r($flg); die;
            
    /****************************************end************************************************/
             //echo'<pre>'; print_r($inventoryCovering); die;
             $stack = array('stock_cover' => $stockCover, 'stockCoverDemand' => $stockCoverDemand,'balanceDF' => $balanceDF, 'inventoryCovering' => $inventoryCovering);
             $d = array_merge($item, $stack,$allinone);
             //echo'<pre>'; print_r($d); die;
             $items[] =  $d;
      }
            $response['data'] = $items;
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
