<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Mail;
use App\Mail\FeedbackMail;
class RequestController extends Controller
{

		public function index() {
			$requests = DB::table('requests')->orderBy('id', 'desc')->paginate(10);
			return view('requests.index', ['posts' => $requests]);
}

		public function request($id) {
			$request =  DB::table('requests')->where('id', '=', $id)->get();
			return view('request', ['request' => $request]);
}

public function create()
    {
  return view('request');
    }

    public function store(Request $request)
    {
			$validatedData = $request->validate([
			            'subject' => 'required|max:255',
			            'Message' => 'required|alpha_num',
			            'file' => 'required|file',
			        ]);
			       // Request::create($validatedData);
						     $path = $request->file('file')->store('public');
								 $file_url = Storage::url($path);
								 $validatedData['file']=$file_url;
								 $user_id = auth()->user()->id;
								 $validatedData["user_id"]=$user_id;
								 $validatedData["created_at"]= Carbon::now();;
								 //array_push($validatedData,$user_id);
						 		DB::table('requests')->insert($validatedData);

			      // return $validatedData;
				return redirect()->back()->with('message','Заявка создана успешно');
    }
}
