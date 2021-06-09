<?php

namespace App\Exports;
use Carbon\Carbon;
use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\withHeadings;

//use Maatwebsite\Excel\Concerns\WithColumnFormatting;
//use Maatwebsite\Excel\Concerns\WithMapping;

class ordersExport implements FromCollection,withHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
        return $item = Order::all();
        $created_at = date("jS F,  Y", strtotime($item->created_at));
    }

   
    public function headings():array{

          return['Order No','Coustomer Id','Coustomer Name','Shipping Name','Shipping Address','Shipping City','Shipping State','Pincode' ,'Country','Mobile','Shipping Charges','Coupon Used','Discount','Order Status','tracking_msg','Payment Method','Grand Total','Created At','Updated_AT'];
         }

       
}
