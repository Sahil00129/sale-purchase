<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BulkImport;
use App\Models\itemMaster;
use DB;
use Auth;
use Response;

use Illuminate\Http\Request;

class ImportDataController extends Controller
{ 
    public function importDataView()
    {
        return view('pages.import-data');
    }
  public function importData()
  {
    
        try
        {     
           //echo'<pre>'; print_r($_FILES); die;
            $data = Excel::import(new BulkImport, request()->file('file'));
            $response['success'] = true;
            $response['messages'] = 'Succesfully imported';
            return Response::json($response);
        
        }catch (\Exception $e) {
          $response['success'] = false;
          $response['messages'] = 'something wrong';
         // echo'<pre>'; print_r($e); die;
          return Response::json($e);
        }
    }

    public function getsinglepdf()
    {

      
      if (Auth::check()) 
      {

          $site_id = Auth::user()->site_id;  
          
          //echo "<pre>";print_r($user_id);die;
          if($site_id == 0) {
            $sites = DB::table('warehouse_sites')->select('site_id')->get(); 
          }
          else{
            $sites = DB::table('users')->select('site_id')->where('site_id',$site_id)->get();
          } 
          $group = DB::table('item_master')->select('group')->distinct()->get();
           return view('pages.singlePdf', ['list' => $group, 'site' => $sites]);
      }
      else{

         return redirect('/login');
      }

    }

    public function getItemsofgroup()
    {
       //echo "<pre>";print_r($_POST);die;
        $packing = DB::table('item_master')->select('pack')->where('group',$_POST['group'])->distinct()->get();

        $response['success'] = true;
        $response['messages'] = $packing;
        return Response::json($response);
    }

    public function bulkpdf()
    {
        if (Auth::check())
        {
            $site_id = Auth::user()->site_id;  
            //echo "<pre>";print_r($user_id);die;
            if($site_id == 0) {
              $sites = DB::table('warehouse_sites')->select('site_id')->get(); 
            }
            else{
              $sites = DB::table('users')->select('site_id')->where('site_id',$site_id)->get();
            } 
            $group = DB::table('item_master')->select('group')->distinct()->get();
             return view('pages.BulkPdf', ['list' => $group, 'site' => $sites]);
        }
        else{

           return redirect('/login');
        }
     }  

}
