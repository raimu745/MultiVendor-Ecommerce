<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use App\Models\Attributes;
use App\Models\ProductImage;
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
        if ($request->hasFile('pimage')) {
            $file = $request->file('pimage');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $imagePath =  $filename;
    
           
             $file->move(public_path('admin/product'), $filename);
             
             // Delete the old image if it exists
            if ($products->pimage) {
                $oldImagePath = public_path('admin/product') . '/' . $products->pimage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
    }

             $products->pimage = $imagePath;
        }
        //   video update and delete old 
        if ($request->hasFile('pvideo')) {
            $file = $request->file('pvideo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '-' .rand(). '.' . $extension;
            $imagePath =  $filename;
    
           
             $file->move(public_path('admin/videos/product'), $filename);
             
             // Delete the old image if it exists
            if ($products->pvideo) {
                $oldImagePath = public_path('admin/videos/product') . '/' . $products->pvideo;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
    }

             $products->pvideo = $imagePath;
        }

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


    function addattribute($id , Request $request){
       $products = Product::with('attributes')->find($id);
    //    dd($products);
      
       if($request->isMethod('post')){
        
       $request->validate([
        'size.*' => 'required',
        'sku.*' => 'required',
        'price.*' => 'required',
        'stock.*' => 'required',
       ]);

         $data = $request->all();
            foreach ($data['sku'] as $key=> $val){
                if(!empty($val)){
                    $attribute = new Attributes();
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->status = 1;
                    $attribute->save();


                }
            
            }

       } 
      return view('admin.products.attribute',compact('products'));
    }

    function addimages($id, Request $request){
       
      
        $products = Product::with('productimage')->find($id);
        // dd($products);

        if($request->isMethod('post')){

            foreach ($request->file('images') as $image) {
               
                $extension = $image->getClientOriginalExtension();
                $imageName = rand() . '.' . $extension;
               
                // Move the image to the desired storage location
                $image->move(public_path('admin/productimage'), $imageName);

                // Create a new ProductImage instance for each image
                $pimage = new ProductImage();
                $pimage->product_id = $id;
                $pimage->images = $imageName;
                $pimage->status = 1;
                $pimage->save();
            }
           
        }


        return view('admin.products.productimages',compact('products'));

    }

    function productimageStatus(Request $request){
        if($request->ajax()){
          // dd($request->all());
          if ($request->val == 'Active'){
               $val = 0;
          }else{
              $val = 1;
          }
          ProductImage::where('id', $request->id)->update(['status' => $val]);
          return response()->json(['val'=> $val]);
        }
   }

   function productimageDelete($id){
       $productimage = ProductImage::find($id);
       $productimage->delete();
       return redirect()->back();
   }

}