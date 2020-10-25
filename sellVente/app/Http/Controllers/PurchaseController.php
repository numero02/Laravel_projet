<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use Auth;

class PurchaseController extends Controller
{
    public function index(){
        if((Auth::user() !== null) && (Auth::user()->role == "Fournisseur")){
            
            $demandes = \DB::table('purchases')
                ->join('ads','ads.id','ad_id')
                ->where('purchases.id_seller','=',Auth::user()->id)
                ->select('ad_id','ads.name')
                ->distinct()
                ->get();
            // dd($demandes);
            return view('list-demandes',[ 'element'=> $demandes]);

        }else{

            abort('404');
        
        }
    }

    public function store(Request $request){
        $purchase = new Purchase();
        
        $purchase->ad_id = $request->input('ad_id');
        $purchase->id_buyer = $request->input('user_buyer');
        $purchase->id_seller = $request->input('user_seller');
        $purchase->state = $request->input('state');
        
        $purchase->save();
        
        return redirect()->back();

    }

    public function purchaseDisplay($id){
        if((Auth::user() !== null) && (Auth::user()->role == "Fournisseur")){
            
            $demandes = \DB::table('purchases')
                ->join('users','users.id','purchases.id_buyer')
                ->where('purchases.ad_id','=',$id)
                ->select('purchases.*','users.*')
                ->get();
            
           
            
            return view( 'list-demandes-achats' , ['element' => $demandes] );
        
        }else{

            abort('404');
        
        }
    }

    public function purchaseApprove(Request $request){
       
      
        
        $approve = \DB::table('purchases')
                        ->where([
                            ['purchases.ad_id','=',$request->input('ad_id')],
                            ['purchases.id_buyer','=',$request->input('id_buyer')],
                            ['purchases.id_seller','=',$request->input('id_seller')]
                        ])
                        ->update(['state' => 'vendu à cet acheteur']);
        
        $approve2 = \DB::table('purchases')
                        ->where([
                            ['purchases.ad_id','=',$request->input('ad_id')],
                            ['purchases.id_buyer','!=',$request->input('id_buyer')],
                            ['purchases.id_seller','=',$request->input('id_seller')]
                        ])
                        ->update(['state' => 'vendu à un autre acheteur']);
        
        $approve2 = \DB::table('ads')
                        ->where([
                            ['ads.id','=',$request->input('ad_id')],
                        ])
                        ->update(['article_state' => 'Vendu']);
                                        
        return redirect()->back();
    }

}
