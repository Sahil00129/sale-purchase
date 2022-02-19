<?php

namespace App\Imports;

use App\Models\ClientSites;
use DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientImport implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
     
        $sender = DB::table('group_identity_client_sites')
        ->where('sites', '=', $row['sites'])
        ->where('client', '=', $_POST['client'])
        ->first();
        if(is_null($sender)) {
        return new ClientSites([ 
            'sites'  => $row['sites'],
            'group' => $_POST['group'],
            'identity' => $_POST['identity'],
            'client' => $_POST['client'],          
     ]);
    }
    
    }
}
