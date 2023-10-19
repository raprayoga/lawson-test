<?php

namespace App\Http\Controllers\Report;

use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SalesController extends Controller
{
    public function report_sales()
    {
        return view('report.report_sales');
    }

    public function export_sales(Request $request)
    {
        $daterange = explode(' - ', $request->daterange);

        $date_start = $daterange[0];
        $date_end = $daterange[1];
        $based_on = $request->based_on;

        return Excel::download(new OrderExport($date_start, $date_end, $based_on), 'sales.xlsx');
    }
}
