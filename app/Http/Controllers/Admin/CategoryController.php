<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function categories(){
        
        $categories = Category::with('section','parentCategory')->get();
        // dd($categories);
        return view('admin.category.category')->with(compact('categories'));
    }

    function updateCategoryStatus(Request $request){
        if($request->ajax()){
          // dd($request->all());
          if ($request->val == 'Active'){
               $val = 0;
          }else{
              $val = 1;
          }
          Category::where('id', $request->id)->update(['status' => $val]);
          return response()->json(['val'=> $val]);
        }
}

    function addCategory(Request $request){

        $sections = Section::all();

     if($request->isMethod('post')){
    
        $categories = new category();
        $categories->cname = $request->cname;
        $categories->parent_id = $request->parent_id;
        $categories->section_id = $request->section_id;
        $categories->cdiscount = $request->cdiscount;
        $categories->description = $request->description;
        $categories->url = $request->url;
        $categories->meta_title = $request->meta_title;
        $categories->meta_description = $request->meta_description;
        $categories->meta_keyword = $request->meta_keyword;
        $categories->status = 1;

        if ($request->hasFile('cimage')) {
            $file = $request->file('cimage');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $imagePath =  $filename;
    
           
             $file->move(public_path('admin/category'), $filename);

             $categories->cimage = $imagePath;
        }
        $categories->save();
        return redirect()->back()->with('msg','Category has been Updated SuccessFully');
     }

        return view('admin.category.addCategory')->with(compact('sections'));
    }

    function fetchCategory(Request $request){
        $id = $request->id;
       $category =  Category::where('section_id',$id)->get();
       return response()->json(['category' => $category]);
    }
    function editcategory($id){
            $sections = Section::all();
             $category = Category::with('subcategory')->where('id',$id)->first();
            //   dd($category);
             $categories = Category::where('section_id',$category->section_id)->get();
             return view('admin.category.editcategory',compact('category','sections','categories'));
    }

    function updatecategory(Request $request,$id){
        $category = Category::find($id);

        $category->cname = $request->cname;
        $category->parent_id = $request->parent_id;
        $category->section_id = $request->section_id;
        $category->cdiscount = $request->cdiscount;
        $category->description = $request->description;
        $category->url = $request->url;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;
        $category->status = 1;

        if ($request->hasFile('cimage')) {
            $file = $request->file('cimage');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $imagePath =  $filename;
    
           
             $file->move(public_path('admin/category'), $filename);
             
             // Delete the old image if it exists
            if ($category->cimage) {
                $oldImagePath = public_path('admin/category') . '/' . $category->cimage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
    }

             $category->cimage = $imagePath;
        }

        $category->save();

        return redirect()->back()->with('msg','Category Updated Successfully');
    }
   function categorydelete($id){
        
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
   }
}
