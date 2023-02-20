<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\product;
use App\Models\e_com;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    
   
    public function index()
    {
        //
    }

  
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $res = new product;
        $res->product_name=$request->input('txt_product_name');
        $res->product_des=$request->input('txt_product_des');
        


           if($request->file('txt_product_image')){
            $file= $request->file('txt_product_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $res['product_image']= $filename;
        }   
        $res->product_price=$request->input('txt_product_price');
        $res->cat_id=$request->input('cat_id');
        $res->save();
        // $request->session()->flash('msg','Data submitted');
                                              
        return redirect('product');
    }

    
    public function show(product $product)
    {
        return view('product')->with('proarr',product::all())->with('ecomarr',e_com::all());
    }


    public function edit(product $product,$id)
    {
        return view('product')->with('proarr',product::find($id));
    }

    public function update(Request $request, product $product)
    {
        $res =product::find($request->id) ;
        $res->product_name=$request->input('txt_product_name');
        $res->product_des=$request->input('txt_product_des');
        $res->product_price=$request->input('txt_product_price');
        $res->cat_id=$request->input('cat_id');

        
        if($request->file('txt_product_image')){
            $file= $request->file('txt_product_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $res['product_image']= $filename;
        }   
       

        $res->save();

        // $request->session()->flash('msg','Data updateds');
        return redirect('product');
    }

   
    public function destroy(product $product, $id)
    {
        product::destroy(array('id',$id));

        return redirect('product');
    }

    public function productshow(product $product)
    {

    //    return ddd(product::all());
    //  return view('user/index')->
            return view('user/shop')->with('proarr',product::all())->with('ecomarr',e_com::all());

    }
    
    public function categoryproduct(product $product ,Request $request)
    {
        $id=$request->id;
        
    //    return ddd(product::all());
    //  return view('user/index')->
            return view('user/shopshow')->with('proarr',product::where('cat_id',$id)->get())->with('ecomarr',e_com::all());
             // $data=array('cat_id'=>$cat_id);
            
    }
    
    // $compactData=array('students', 'instructors', 'instituitions');
    public function productsshow(product $product)
    {
        return view('user/index')->with('proarr',product::all())->with('ecomarr',e_com::all());
    }

    public function addtocart(Request $request)
    {
        // ddd(Auth::user()->id);
        // $request->Auth::user('id');
        if(Auth::check())
        {
            $cart = new Cart;
            $cart->user_id=Auth::user()->id;
            $cart->prod_id=$request->product_id;

            $cart->save();

           return redirect('/index');

        }
        else{
            return redirect('login');
        }

    }
    public function cartlist()
    {
        // dd(Auth::user('id'));
        // echo 'hello';
        $userid=Auth::user()->id;
        // dd($userid);
        $product=DB::table('carts')->join('products','carts.prod_id','=','products.id')
        ->where('carts.user_id',$userid)
        ->select('products.*','carts.id as cart_id')
        ->get();
        // dd($product);
        // return $product;
        return view('user/addtocart',['products'=>$product])->with('ecomarr',e_com::all());
        // return view('user/addtocart')->with('ecomarr',e_com::all());
    }

    
    public function removecartlist($id)
    {
        Cart::destroy($id);
        return redirect('addtocart');
    }

    public function detail($id)
    {
        $data=  product::find($id);
        return view('user/shopdetails',['product'=>$data])->with('ecomarr',e_com::all());
    }

    
    public function search(Request $request)
    {
        // return $request->input();
         $data= product::
        where('product_name', 'like' , '%'.$request->input('search').'%')->get();

        return view('user/index',['product'=>$data]);
    }

    public static function cartitem(Type $var = null)
    {
       
        $userid=Auth::user()->id;

        return Cart::where('user_id',$userid)->count();

    }

}
