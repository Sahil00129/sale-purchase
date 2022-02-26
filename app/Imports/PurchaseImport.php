<?php

namespace App\Imports;

use App\Models\itemMaster;
use App\Models\MonthlyPurchase;
use App\Models\DailybasePurchase;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PurchaseImport implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function  model(array $row)
    {

        if($_POST['p_type'] == 1){
           // echo "<pre>"; print_r($row);die;
           if (itemMaster::where('item_number', '=', $row['item_number'])->exists()) {
            return new MonthlyPurchase([
                'item_number'  => $row['item_number'],
                'item_name'  => $row['item_name'],
                'df'  => $row['df'],
                'add_adf'  => $row['add_adf'],
                'sites'  => $row['sites'],
                'identity' => $_POST['identity'],
                'client' => $_POST['client'],
                'month_year' => $_POST['month_year'],
            ]);
    
            }
         }
        
         if($_POST['p_type'] == 2){
           //echo "<pre>"; print_r($row);die;
            if (itemMaster::where('item_number', '=', $row['item_number'])->exists()) {  
                 return new DailybasePurchase([
                     'item_name'  => $row['item_name'],
                     'item_number'  => $row['item_number'],
                     'stock_in_hand'  => $row['stock_in_hand'],
                     'stock_in_transit'  => $row['stock_in_transit'],
                     'mtd_sales'  => $row['mtd_sales'],
                     'pending_customer_order'  => $row['pending_customer_order'],
                     'sites'  => $row['sites'],
                     'identity' => $_POST['identity'],
                     'client' => $_POST['client'],
                 ]);
              
             }
          }
        
    }
}
