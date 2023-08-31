<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    function adminSection(){
       
        $sections = Section::all();
        return view('admin.adminsection.sections')->with(compact('sections'));
    }

    function updateSectionStatus(Request $request){
        if($request->ajax()){
          // dd($request->all());
          if ($request->val == 'Active'){
               $val = 0;
          }else{
              $val = 1;
          }
          Section::where('id', $request->id)->update(['status' => $val]);
          return response()->json(['val'=> $val]);
        }
}
       
            function adminSectionEdit($id){
                dd($id);
            }

            function adminSectionDelete($id){
               
                $section = Section::find($id);
                $section->delete();
                return redirect()->back();
            }
          
            function addSection(Request $request){

                if($request->isMethod('post')){
                    // dd($request->all());
                    $section = new Section();
                    $section->name = $request->name;
                    $section->save();
                    return redirect('adminSection');
                }

                return view('admin.addSection');
                
            }

            function editSection(Request $request, $id){
                $section = Section::find($id);
               
              if($section){
                return response()->json([
                    'section' => $section
                ]);
              }
            
                return response()->json(['error' => 'Section not found'], 404);

            }

        function updateSection(Request $request ,$id){
            // dd($request->uname);
            $section = Section::find($id);
            $section->name = $request->uname;
            $section->save();

            return response()->json([
                'section' => $section
            ]);
        }    
}
