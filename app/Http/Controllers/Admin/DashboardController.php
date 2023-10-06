<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guestbook;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data['table'] = Guestbook::all();
            return view('dashboard._data_table', $data);
        }
        //format tanggal
        $date = Carbon::now();

        //today
        $startOfToday = $date->startOfDay()->toDateTimeString();
        $endOfToday = $date->endOfDay()->toDateTimeString();

        //yesterday
        $startOfYesterday = $date->yesterday()->startOfDay()->toDateTimeString();
        $endOfYesterday = $date->yesterday()->endOfDay()->toDateTimeString();

        //wekday
        $startOfWeek = $date->startOfWeek()->toDateTimeString();
        $endOfWeek = $date->endOfWeek()->toDateTimeString();

        //lastweek
        $startOfLastWeek = $date->subWeek()->startOfWeek()->toDateTimeString();
        $endOfLastWeek = $date->subWeek()->endOfWeek()->toDateTimeString();


        $data['hari_ini'] = Guestbook::whereBetween('created_at', [$startOfToday, $endOfToday])->count();
        $data['hari_kemarin'] = Guestbook::whereBetween('created_at', [$startOfYesterday, $endOfYesterday])->count();
        $data['minggu_ini'] = Guestbook::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        $data['minggu_kemarin'] = Guestbook::whereBetween('created_at', [$startOfLastWeek, $endOfLastWeek])->count();
        return view('dashboard.index', $data);
    }
}
