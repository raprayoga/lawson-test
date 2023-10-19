<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
{
    private $date_start;
    private $date_end;
    private $based_on;

    public function __construct($date_start, $date_end, $based_on)
    {
        $this->date_start = $date_start;
        $this->date_end = $date_end;
        $this->based_on = $based_on;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        switch ($this->based_on) {
            case 'product':
                return DB::table('order_item')
                    ->select('products.name',  DB::raw('sum(quantity) as total_quantity'))
                    ->groupBy('products.name')
                    ->join('products', 'order_item.product_id', '=', 'products.product_id')
                    ->where('order_item.date', '<', $this->date_end)->where('order_item.date', '>', $this->date_start)
                    ->get();

            case 'city':
                return DB::table('order_item')
                    ->select('city.name', DB::raw('sum(quantity) as total_quantity'))
                    ->groupBy('city.name')
                    ->join('products', 'order_item.product_id', '=', 'products.product_id')
                    ->join('merchant', 'products.merchant_id', '=', 'merchant.id')
                    ->join('city', 'merchant.city_id', '=', 'city.id')
                    ->where('order_item.date', '<', $this->date_end)->where('order_item.date', '>', $this->date_start)
                    ->get();

            case 'month':
                return DB::table('order_item')
                    ->select(DB::raw('MONTH(date)'), DB::raw('sum(quantity) as total_quantity'))
                    ->groupBy(DB::raw('MONTH(date)'))
                    ->where('order_item.date', '<', $this->date_end)->where('order_item.date', '>', $this->date_start)
                    ->get();

            case 'user':
                return DB::table('order_item')
                    ->select('users.full_name',  DB::raw('sum(quantity) as total_quantity'))
                    ->groupBy('users.full_name')
                    ->join('users', 'order_item.user_id', '=', 'users.id')
                    ->where('order_item.date', '<', $this->date_end)->where('order_item.date', '>', $this->date_start)
                    ->get();

            default:
                # code...
                break;
        }
    }

    public function headings(): array
    {
        return [$this->based_on, "quantity"];
    }
}
