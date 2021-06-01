<?php

namespace App\Exports;

use App\Coupon;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\withHeadings;

class couponsExport implements FromCollection, withHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Coupon::all();
    }

    public function headings():array{
        return['Coupon No','Coupon Name','Amount','Amount Type','Expiry Date','Coupon Status','Created At','Updated AT'];
            
        }
    

}
