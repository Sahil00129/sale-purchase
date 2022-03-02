<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BulkImport;
use App\Models\itemMaster;
use App\Models\ClientSites;
use App\Models\User;
use DB;
use Auth;
use Session;
use Response;

use Illuminate\Http\Request;

class ImportDataController extends Controller
{ 
    public function importDataView()
    {
      $clients = ClientSites::select('client')->distinct()->get();
      $identitys = ClientSites::select('identity')->distinct()->get();
      return view('pages.import-data',['clients' => $clients, 'identitys' => $identitys]);
    }
  public function importData()
  {       
    try
    {   
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
        fgetcsv($csvFile);
        $ignored = array(); 
        while(($csvData = fgetcsv($csvFile)) !== FALSE){
        $csvData = array_map("utf8_encode", $csvData);
        //echo "<pre>"; print_r($csvData[3]);die;
        if($_POST['import_type'] != 1){
        $exists = itemMaster::where('item_name', '=', $csvData[3])->exists();
        //echo "<pre>"; print_r($exists);die;
        if(!$exists){
            $ignored[] = $csvData[3];
        }
        }
        else{
            $ignored[] = '';
        }
        }     
        $countIgnored = count($ignored);
        //echo "<pre>"; print_r($countIgnored);die;
        $data = Excel::import(new BulkImport,request()->file('file'));
        $response['success'] = true;
        $response['ignoredItems'] = $ignored;
        $response['ignoredcount'] = $countIgnored;
        $response['messages'] = 'Succesfully imported';
        return Response::json($response);

    }catch (\Exception $e) {
        $bug = $e->getMessage();
        $response['success'] = false;
        $response['messages'] = $bug;
        return Response::json($response);
    }
       
    //return back();
    }

    public function getsinglepdf()
    {
 
      if (Auth::check()) 
        {
          //$site_id = Auth::user()->id;  
          //$role = Auth::user()->role;
          //$role_name = $role->name;
          //echo'<pre>';print_r($site_id->role);die;
          $site_id = Auth::User();
          if($site_id->role == 'super admin'){
          $sites = DB::table('identity_client_sites')->select('sites')->distinct()->get();
          $identitys = DB::table('identity_client_sites')->select('identity')->distinct()->get();
          $clients = DB::table('identity_client_sites')->select('client')->distinct()->get();

            }else{   
            $sites = DB::table('users')->select('sites')->where('sites',$site_id->sites)->distinct()->get();
            $identitys = DB::table('users')->select('identity')->where('identity', $site_id->identity)->distinct()->get();
            $clients = DB::table('users')->select('client')->where('client',$site_id->client)->distinct()->get();
            //$clients = $cl->toArray();
            //$s = json_decode($clients);
            //echo'<pre>';print_r($client);die;
          } 
          $group = DB::table('item_master')->select('group')->distinct()->get();
          return view('pages.singlePdf',['list' => $group, 'site' => $sites, 'identity' => $identitys, 'client' => $clients]);
        }
         else{
         return redirect('/login');
      }
    }
    public function getItemsofgroup()
    {
       //echo "<pre>";print_r($_POST);die;
       $packing = DB::table('item_master')->select('common_name')->where('group',$_POST['group'])->distinct()->get();
        $response['success'] = true;
        $response['messages'] = $packing;
        return Response::json($response);
    }

    public function bulkpdf()
    {
        if (Auth::check())
        {
            $site_id = Auth::User();
            //echo "<pre>";print_r($user_id);die;
            if($site_id->role == 'super admin'){
              $sites = DB::table('identity_client_sites')->select('sites')->distinct()->get();
              $identitys = DB::table('identity_client_sites')->select('identity')->distinct()->get();
               $clients = DB::table('identity_client_sites')->select('client')->distinct()->get();
            }
            else{
              $sites = DB::table('users')->select('sites')->where('sites',$site_id->sites)->distinct()->get();
              $identitys = DB::table('users')->select('identity')->where('identity', $site_id->identity)->distinct()->get();
              $clients = DB::table('users')->select('client')->where('client',$site_id->client)->distinct()->get();
            } 
            $group = DB::table('item_master')->select('group')->distinct()->get();
             return view('pages.BulkPdf', ['list' => $group, 'site' => $sites, 'identity' => $identitys, 'client' => $clients]);
          }
          else{
           return redirect('/login');
        }
     }  
}
