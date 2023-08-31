<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function brand(){
        $brands = Brand::all();
        return view('admin.brand.brand',compact('brands'));
    }

    function addbrand(Request $request){
       

        if($request->isMethod('post')){
            $brand = new Brand();
            $brand->name = $request->name;
            $brand->status = 1;
            $brand->save();
            return redirect('brand');
        }
      
        return view('admin.brand.addbrand');
       
    }

    function branddelete($id){
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->back();
    }

    function editbrand($id){
        $brand = Brand::find($id);
        return view('admin.brand.editbrand',compact('brand'));
    }

    function upbrand(Request $request,$id){
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->status = 1;
        $brand->save();
        return redirect('brand')->with('msg','Brand Updated Successfully');
    }
}
