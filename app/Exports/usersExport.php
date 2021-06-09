<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\withHeadings;


class usersExport implements FromCollection,withHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $item=  User::all();
        $created_at = date("jS F,  Y", strtotime($item->created_at));
    }

    
    public function headings():array{
        return['User No',' Name','Address','City','State','Country','Pincode','Mobile','Email','Role','Created At','Updated AT'];
            
        }
}
