<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Ad;


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
        if(Auth::user()->privilege =="admin"){
            
            $data['data']=User::all();
            $data['privilege']='admin';

            return view('home',["list" => $data]);

        }else if(Auth::user()->role == "Fournisseur"){

            $el = \DB::table('users')
                ->join('ads','ads.user_id','users.id')
                ->join('categories','categories.id','ads.category_id')
                ->select('ads.*','users.*','users.name as nameUsers','ads.name as adsName','ads.id as idAd','categories.name as nameCategory')
                ->where('ads.user_id',Auth::user()->id)
                ->get();
                        
            if(Auth::user()->active == "Oui"){
                
                return view('ads',["list" => $el]);   
        
            }else{
                return view('message');
            }

        }elseif(Auth::user()->role == "Acheteur"){
            
            $el = \DB::table('users')
                ->join('ads','ads.user_id','users.id')
                ->join('categories','categories.id','ads.category_id')
                ->select('ads.*','users.*','users.name as nameUsers','ads.name as adsName','ads.id as idAd','categories.name as nameCategory')
                ->get();
            
            if(Auth::user()->active == "Oui"){
                return view('ads',["list" => $el]);
            }else{
                return view('message');
            }
            
        }
    }
    
    public function ads(){
        
        if(Auth::user()->privilege == "admin"){
           
            $ad = \DB::table('ads')
            ->join('users','ads.user_id','users.id')
            ->join('categories','ads.category_id','categories.id')
            ->select('ads.*','users.username','categories.name as catName')
            ->get();

            return view('admin-ads',['list' => $ad ]);
        }else{
            abort('404');
        }
    }

    public function destroy($id){
        if(Auth::user()->privilege == "admin"){
                
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->back();
        }else{
            abort('404');
        }
    }

    public function active($id){
             
        if(Auth::user()->privilege == "admin"){
            
            $user=User::find($id);

            if($user->active == "Oui"){    
                $user->active ="Non";
            }else{
                $user->active ="Oui";
            }
            $user->save();
            return redirect()->back();
        
        }else{
            abort('404');
        }
    }

    public function rightsAdmin($id){
        if(Auth::user()->privilege == "admin"){    
            $user=User::find($id);
            
            if($user->privilege !== "admin"){
                
                $user->privilege ="admin";
            
            }else{
            
                $user->privilege ="usager";

            }

            $user->save();

            return redirect()->back();
        }else{
            abort('404');
        }
    }

}
