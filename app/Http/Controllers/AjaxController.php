<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\saleData;
use App\Models\purchaseData;
use DataTables;

class AjaxController extends Controller
{
    public function getServerSide(Request $request)
    {
         if ($request->ajax()) {
            $sales = saleData::select('*');
            //echo'<pre>'; print_r($sales); die;
            return Datatables::of($sales) ->addIndexColumn()
           
            ->addColumn('bill_date', function($row)
              {
                 $date = date("d-m-Y", strtotime($row->bill_date));
                 //echo'<pre>'; print_r($date); die;
                 return $date;
              })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('pages.salesData-table');
    }
    public function getpurchaseServerSide(Request $request)
    {
         if ($request->ajax()) {
            $purchase = purchaseData::select('*');
            return Datatables::of($purchase)->make(true);
         }

        return view('pages.purchaseData-table');
    }

}
