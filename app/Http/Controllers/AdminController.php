<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
class AdminController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$is_manager = auth()->user()->is_manager;
			if($is_manager==1){
			$requests = DB::table('requests')
											 ->join('users', 'requests.user_id', '=', 'users.id')
											 ->select('requests.id', 'requests.subject', 'requests.Message', 'users.login', 'users.email', 'requests.file', 'requests.created_at')
											 ->simplePaginate(5);
								 	//		return view('requests.index', ['posts' => $requests]);
			$page =	view('admin')->with('requests', $requests);
			}
		else{
			$user_id = auth()->user()->id;
			$requests = DB::table('requests')->where('user_id', '=', $user_id)
										->orderBy('created_at', 'desc')
                    ->take(1)->get();
			$add_allowed="1";
					if(count($requests)>0){
						$blocked_data =  Carbon::parse($requests[0]->created_at)->addDays(1);
						$current_data = new Carbon();
						if(strtotime($blocked_data)>strtotime($current_data)){
							$add_allowed="0";
						}
						}
						$page = view('request')->with('add_allowed', $add_allowed);
			}
      return $page;
 //return $requests;
    }
}
