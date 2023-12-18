<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // //index
    public function index()
    {
        if ( auth('super_admin')->check()) {
            // $yesterday = Carbon::yesterday()->toDateString();
            $today   = Carbon::now()->day;           
            $lastday   = Carbon::now()->day - 1 ;
            $this_month   = Carbon::now()->month;
            $last_month   = Carbon::now()->month - 1 ;

            $today_sale = DB::table('sales')->where(['day' => $today])->groupBy('day')->sum('total_price');
            $last_today_sale = DB::table('sales')->where(['day' => $lastday])->groupBy('day')->sum('total_price');
            $this_month_sale = DB::table('sales')->where(['month' => $this_month])->groupBy('month')->sum('total_price');
            $last_month_sale = DB::table('sales')->where(['month' => $last_month])->groupBy('month')->sum('total_price');
            return view('backend.dashboard',compact(['today_sale','last_today_sale','this_month_sale','last_month_sale']));
        } else {
            return view('errors.404');
        }
    }
}
