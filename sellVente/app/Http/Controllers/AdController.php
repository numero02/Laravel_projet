<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ad;
use Auth;
use App\Category;

class AdController extends Controller
{
   
    public function index(){
        
        
        $el = \DB::table('users')
            ->join('ads','ads.user_id','users.id')
            ->join('categories','ads.category_id','categories.id')
            ->select('ads.*','users.*','users.name as nameUsers','ads.name as adsName','ads.id as idAd','categories.name as nameCategory')
            ->where('ads.article_state','=','En Stock')
            ->get();
       
        return view('ads',["list" => $el]);
    }

   
    public function show($id)
    {

        if( Auth::user() !== null ){
            
            $el['data'] = \DB::table('users')
                ->join('ads' ,'ads.user_id', 'users.id')
                ->select('ads.*','users.*','users.name as nameUsers','ads.name as adsName','ads.id as idAd','users.id as idUser','ads.user_id as adsUser')
                ->where('ads.id','=',$id)
                ->get();
            
            
            
            $el['messages']=\DB::table('messages')
            ->where([
                ['ad_id','=',$id],
                ['id_buyer','=',Auth::user()->id]
            ])
            ->get();
                
            $el['achat']= \DB::table('purchases')
                ->join('ads','ads.id','purchases.ad_id')
                ->join('users','users.id','purchases.id_buyer')
                ->where([
                    ['purchases.ad_id','=',$id],
                    ['purchases.id_buyer','=',Auth::user()->id]
                ])
                ->first();

            //Pour vérifier si cet usager a déjà noté le Fournisseur

            $el['notes-verif'] = \DB::table('scorings')
                        ->where([
                            ['id_buyer','=',Auth::user()->id],
                            ['id_seller','=',$el['data'][0]->user_id]
                        ])
                        ->first();
                 
                        
            //Pour Calculer la note du Fournisseur
            
            $el['notes-count']= \DB::table('scorings')
                                ->where([
                                   
                                    ['id_seller','=',$el['data'][0]->user_id]
                                ])
                                ->select('scorings.id_seller')
                                ->count();
            

            $el['notes-list'] = \DB::table('scorings')
                                    ->where([
                                        
                                        ['id_seller','=',$el['data'][0]->user_id]
                                    ])
                                    ->select('scorings.scoring')
                                    ->get();
            

            if($el['notes-count'] !==0 ){
                $compt=0;
                foreach ( $el['notes-list'] as $key => $value) {

                    $compt += $value->scoring;

                }

                $res = $compt / $el['notes-count'];
                $score = round($res,0);
                $el['score'] = $score;
                $el['score-verif'] = true;
                

            }else{
                
                $el['score-verif'] = false;
            
            }
            
             
             
            if(($el['achat'] !== null)){
                
                $el['verif']=true;
                $el['reponse']=$el['achat']->state;
            
            }else if(($el['achat'] == null)){
                
                $el['verif']=false;
                $request = \DB::table('purchases')
                                        ->where([
                                            ['purchases.ad_id','=',$id],
                                            ['purchases.state','=','vendu à cet acheteur'],
                                            ['purchases.id_buyer','!=',Auth::user()->id]
                                        ])->first(); 
                
                if($request !== null){

                    $el['verif-user']= true;
                
                }else{

                    $el['verif-user']= false;

                }
                
            }
           
            return view('chat',['element' => $el]);

        }else{
            return 'page annonce pour un usager non-authentifier en construction !';
        }
        

    }

    public function show2($id,$id_seller,$id_buyer){
        $el['data'] = \DB::table('users')
                ->join('ads' ,'ads.user_id', 'users.id')
                ->select('ads.*','users.*','users.name as nameUsers','ads.name as adsName','ads.id as idAd','users.id as idUser','ads.user_id as adsUser')
                ->where('ads.id','=',$id)
                ->get();
        $el['messages']=\DB::table('messages')->where([
            ['id_seller', '=',$id_seller ],
            ['id_buyer','=',$id_buyer],
            ['ad_id','=',$id]
        ])
        ->get();
        $el['ad_id']=$id;
        $el['id_seller']=$id_seller;
        $el['id_buyer']=$id_buyer;
        
        return view('chat-fournisseur',['element' => $el]);

    }

    public function create(){
       
        if(Auth::user() !== null){
          
            $cat = Category::all();
            return view('ad-new',['categorie' => $cat]);
        
        }else{
        
            abort('404');
        
        }
    }

    public function store(){
        if(Auth::user() !== null){    
            $annonce = new Ad();

            $annonce->name = request('name');
            $annonce->user_id = request('user_id');
            $annonce->description = request('description');
            $annonce->price = request('price');
            $annonce->realization_place = request('realization_place');
            $annonce->article_state = 'En Stock';
            $annonce->duration = request('duration');
            $annonce->category_id = request('category_id');
            
            $annonce->save();

            return redirect("/home");
        }
    }

    public function edit($id){
        $verif  =   \DB::table('ads')
        ->where('ads.id','=',$id)
        ->select('ads.user_id')
        ->get();

        
        if(Auth::user()->id == $verif[0]->user_id){
            
            $product['product'] = \DB::table('ads')
            ->where('ads.id','=',$id)
            ->first();

            $product['categories'] = \DB::table('categories')
            ->get();

            
            return view('ad-modif',['element'=> $product]);
        }else{
            abort('404');
        }
        
    }

    public function update($id,Request $request){
        
        
        $product = Ad::find($id);
        
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->realization_place = $request->input('realization_place');
        $product->duration = $request->input('duration');
        $product->category_id = $request->input('category_id');
        
        $product->save();  

        return redirect('/home'); 
               
        
       
    }

    
    public function destroy($id){

        if(Auth::user() !== null){
            $ad = Ad::findOrFail($id);
     
            if(Auth::user()->privilege == "admin" || ($ad->user_id == Auth::user()->id )){
                
                $ad = Ad::findOrFail($id);
                $ad->delete();

                return redirect()->back();
                
            }else{
                abort('404');
            }
        }
    }

    
    
}
