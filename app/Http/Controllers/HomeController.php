<?php

namespace App\Http\Controllers;

use App\Models\Referral_link;
use App\Models\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {


        $userId = Auth::id();


        $refreall_link=Referral_link::where('user_id',$userId)->get();
        $refreall=User::where('referred_by',$userId)->paginate(5);
        $count=User::where('referred_by',$userId)->count();
        return view('home',compact('refreall','refreall_link',"count"));
    }
}
