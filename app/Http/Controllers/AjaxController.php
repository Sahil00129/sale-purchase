<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\saleData;
use App\Models\purchaseData;
use App\Models\MonthlyPurchase;
use App\Models\DailybasePurchase;
use App\Models\StockBalance;
use App\Models\StockTransfer;
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
            return Datatables::of($purchase) ->addIndexColumn()
           
            ->addColumn('bill_date', function($row)
              {
                 $date = date("d-m-Y", strtotime($row->bill_date));
                 //echo'<pre>'; print_r($date); die;
                 return $date;
              })
              ->addColumn('vendor_invoice_date', function($row)
              {
                 $vdate = date("d-m-Y", strtotime($row->vendor_invoice_date));
                 //echo'<pre>'; print_r($date); die;
                 return $vdate;
              })
            ->make(true);
        }

        return view('pages.purchaseData-table');
    }

    public function getopeningServerSide(Request $request)
    {
         if ($request->ajax()) {
            $opening = StockBalance::select('*');
            //ech
            return Datatables::of($opening) ->addIndexColumn()
           
            ->addColumn('fy', function($row)
              {
                 $date = date("d-m-Y", strtotime($row->fy));
                 //echo'<pre>'; print_r($date); die;
                 return $date;
              })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('pages.opening-table');
    }

    public function getstockTransferServerSide(Request $request)
    {
         if ($request->ajax()) {
            $transfer = StockTransfer::select('*');

            return Datatables::of($transfer)->make(true);
         }

        return view('pages.opening-table');
    }


  /*******************************************************************************************************/
  /**************************************Purchase Process Table*******************************************/
  /******************************************************************************************************/

  public function monthlyPurchaseServer(Request $request)
    {
      if ($request->ajax()) {
         $monthlyPurchase = MonthlyPurchase::select('*');
         //echo'<pre>'; print_r($sales); die;
         return Datatables::of($monthlyPurchase) 
         ->make(true);
     }
        return view('purchase pages.monthlypurchase-Table');
    }

    public function dailyPurchaseServer(Request $request)
    {
      if ($request->ajax()) {
         $dailyPurchase = DailybasePurchase::select('*');
         //echo'<pre>'; print_r($sales); die;
         return Datatables::of($dailyPurchase) 
         ->make(true);
     }
        return view('purchase pages.dailybasePurchase-Table');
    }
    
}
