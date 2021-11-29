<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Image;
use DB;
use File;
class ProductController extends Controller
{

     public function __construct()
    {
        $this->middleware('admin');
    }
    //
    public function index()
    {
       $products=Product::all();
       return view('product.index',compact('products'));
    }
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'product_name'=>'required|unique:products|max:255',
            'product_img'=>'required',
            'product_quantity'=>'required|max:255',
            'buying_price'=>'required|max:255',
            'selling_price'=>'required|max:255',
        ]);
        $product=new Product();
        $product->product_name=$request->product_name;
        $image=$request->product_img;
         if($image)
        {
            $image_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('img/product/'.$image_name);
            $product->product_img='img/product/'.$image_name;
        }
        
        $product->product_quantity=$request->product_quantity;
        
        $product->buying_price=$request->buying_price;
        
        $product->selling_price=$request->selling_price;
        $product->save();
        $notification=array(
            'messege'=>' Successfully Added  new Product',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function delete($id){

       $product= Product::find($id);
       $product->delete();
        $notification=array(
            'messege'=>'Product Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
     public function edit($id){

       $product=Product::find($id);
     return view('product.edit',compact('product'));
     }


    public function update(Request $request)
        {
             
            $product=Product::find($request->id)->first(); 
           $data=array();
           $data['product_name']=$request->product_name;
           $data['product_quantity']=$request->product_quantity;
           $data['buying_price']=$request->buying_price;
           $data['selling_price']=$request->selling_price;
           
           $old_img=$product->product_img;
           $new_img=$request->product_img;
           if($new_img){
              
              if(File::exists($old_img)){
                 unlink($old_img);
                  
               }
               else { 
                
               
               

                 $image_name=hexdec(uniqid()).'.'.$new_img->getClientOriginalExtension();
            Image::make($new_img)->resize(300,300)->save('img/product/'.$image_name);
            $data['product_img']='img/product/'.$image_name;
           }}
           $update=DB::table('products')->where('id',$product->id)->update($data);
           if($update)
           {
              $notification=array(
            'messege'=>' Product Details Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
 
           }

    }
}
