<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    function products(){
        $products = Product::with('section','category')->get();
        // dd($products);
        return view('admin.products.products',compact('products'));
    }
    function deleteproducts(){

    }

    function updateProductsStatus(Request $request){
        if($request->ajax()){
          // dd($request->all());
          if ($request->val == 'Active'){
               $val = 0;
          }else{
              $val = 1;
          }
          Product::where('id', $request->id)->update(['status' => $val]);
          return response()->json(['val'=> $val]);
        }
}

    function addproducts(Request $request){
        if($request->isMethod('post')){
            
            // dd($request->all());
        $section = Category::where('id', $request->category_id)->pluck('section_id')->first();
        //    dd($section);
       
        $products = new Product();
        $products->section_id = $section;
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->pname = $request->pname;
        $products->pcode = $request->pcode;  
        $products->pcolor = $request->pcolor;
        $products->pprice = $request->pprice;
        $products->pdiscount = $request->pdiscount;
        $products->pweight = $request->pweight;
        $products->description = $request->description;
        $products->meta_title = $request->meta_title;
        $products->meta_description = $request->meta_description;
        $products->meta_keyword = $request->meta_keyword;
        $products->meta_keyword = $request->meta_keyword;
        $products->status = 1;
        
        if ($request->hasFile('pimage')) {
            
            $file = $request->file('pimage');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $imagePath =  $filename;
    
           
             $file->move(public_path('admin/product'), $filename);

             $products->pimage = $imagePath;
        }
        // video upload
        if ($request->hasFile('pvideo')) {
            
            $file = $request->file('pvideo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '-' .rand(). '.' . $extension;
            $imagePath =  $filename;
    
           
             $file->move(public_path('admin/videos/product'), $filename);

             $products->pvideo = $imagePath;
        }


        if(!empty($products->isfeatured)){
            $products->isfeatured = $request->isfeatured;
        }else{
            $products->isfeatured = "no";
        }

        $vendortype = Auth::guard('admin')->user()->type;
        $vendorid = Auth::guard('admin')->user()->vendor_id;
        $adminid = Auth::guard('admin')->user()->id;
        $products->admin_id = $adminid;
        $products->admin_type = $vendortype;

        if($vendortype == 'vendorr'){
            $products->vendor_id = $vendorid;
        }else{
            $products->vendor_id = 0;
        }

        

        $products->save();

         return redirect()->back()->with('msg','Products has been updated successfully');
        }

        $category = Section::with('category')->get();
        $brands = Brand::where(['status'=>1])->get();
        
        return view('admin.products.addproducts',compact('category','brands'));
    }

    function editproduct($id){
        $products = Product::find($id);
        $category = Section::with('category')->get();
        $brands = Brand::where(['status'=>1])->get();
        return view('admin.products.editproduct',compact('products','category','brands'));
    }

    function updateproduct($id,Request $request){
        $products = Product::find($id);
         
        $section = Category::where('id',$request->category_id)->pluck('section_id')->first();
        $products->section_id = $section;
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->pname = $request->pname;
        $products->pcode = $request->pcode;  
        $products->pcolor = $request->pcolor;
        $products->pprice = $request->pprice;
        $products->pdiscount = $request->pdiscount;
        $products->pweight = $request->pweight;
        $products->description = $request->description;
        $products->meta_title = $request->meta_title;
        $products->meta_description = $request->meta_description;
        $products->meta_keyword = $request->meta_keyword;
        $products->meta_keyword = $request->meta_keyword;
        $products->status = 1;
        if(!empty($products->isfeatured)){
            $products->isfeatured = $request->isfeatured;
        }else{
            $products->isfeatured = "no";
        }

        $vendortype = Auth::guard('admin')->user()->type;
        $vendorid = Auth::guard('admin')->user()->vendor_id;
        $adminid = Auth::guard('admin')->user()->id;
        $products->admin_id = $adminid;
        $products->admin_type = $vendortype;

        if($vendortype == 'vendorr'){
            $products->vendor_id = $vendorid;
        }else{
            $products->vendor_id = 0;
        }
        $products->save();

         return redirect()->back()->with('msg','Products has been updated successfully');
    }

}