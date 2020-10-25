<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Ad;
use Auth;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
        
        
        $messages = \DB::table('messages')->where('id_seller',$id)
        ->join('ads','ads.id','messages.ad_id')
        ->join('users','users.id','messages.id_buyer')
        ->select('messages.id_buyer','messages.id_seller','ads.name','messages.ad_id','users.username as pseudo')
        ->distinct()
        ->get();
       
        return view('list-message',['list' => $messages]);
       
    }

    public function store(){
            
            $message= new Message();
            
            $message->message = request('message');
            $message->ad_id = request('ad_id');
            $message->username_sender = request('username_sender');
            $message->id_sender = request('id_sender');
            $message->id_seller = request('id_seller');
            $message->id_buyer = request('id_buyer');
            $message->save();
          
            return redirect()->back();
           
        
    }

}
