<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Country;
use App\Models\Vendor;
use App\Models\VendorBankDetail;
use App\Models\VendorBussinessDetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    function dashboard(){
        Session::put('page','updateDetails');

        return view('admin.layouts.app');
    }
    function home(){
        return view('admin.home');
    }
    function login(){
        return view('admin.login');
    } 
    function logout(){
        Auth::logout();

        return redirect('login');
    }

    function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    function adminLoginStore(Request $request){

        if($request->isMethod('post')){
            // $data = $request->all();
            // dd($data);
           $request->validate([
              'email'=> 'required',
              'password' => 'required'
            ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password, 'role' => 1])){
            
            return redirect('adminDashboard');
        }else{
           
            return redirect()->back()->with('msg','Your Credentials not Matched');
        }    
        }
    }

    function adminPassword(){
        Session::put('page','updatePassword');
        return view('admin.updatePassword');
    }

    function check_cpassword(Request $request){
                
        if (Hash::check($request->cpassword, Auth::guard('admin')->user()->password)) {
            return 'true';
        } else {
            return 'false'; // Return 'false' when password check fails
        }
        
    }
    function updatepass(Request $request){
         
        $request->validate([
          'new_password' => 'required'  
        ]);
       
            
            if ($request->password_confirmation == $request->new_password) {

                Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($request->new_password)]);
                return redirect()->back()->with('msg','Your Password is Updated Successfull');
            } else {
                
                return redirect()->back()->with('error','Your password does not match');
                
            }

       
}

            function updateDetails(){
                
                Session::put('page','updateDetails');     
                return view('admin.updateDetails');
            }

            function addUpdateDetails(Request $request){
                $request->validate([
                     
                    'name' => 'required',
                    'mobile' => 'required|numeric'

                ]);

                $admin = Admin::find(Auth::guard('admin')->user()->id);

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $imagePath = 'admin/upload/' . $filename;
            
                   
                     $file->move(public_path('admin/upload'), $filename);
            
                    // Update the admin's image field with the image path
                    $admin->image = $imagePath;
                }
            
                $admin->name = $request->name;
                $admin->mobile = $request->mobile;
                $admin->save();
            
                
                //  for image upload
                
                // if ($request->hasFile('image')) {
                //     $file = $request->file('image');
                //     $extension = $file->getClientOriginalExtension();
                //     $filename = time() . '.' . $extension;
                //     $imagePath = 'admin/upload/' . $filename;
                
                //     // Save the uploaded image using Laravel's storage system
                //     $file->storeAs('public', $imagePath);
                
                //     // Update the admin's image field with the image path
                //     $admin->image = $imagePath;
                // }
                
        
               
                // 

            //    Admin::where('id',Auth::guard('admin')->user()->id)
            //    ->update([
            //     'name' => $request->name,
            //     'mobile' => $request->mobile
            //    ]);
               return redirect()->back()->with('msg','Admin Details Updated Successfully');
            }
    

     function vendorUpdate($slug , Request $request){
        // $vendorPersonal = null;
        // $vendorBussiness = null;

        if($slug == 'personal'){
            if($request->isMethod('post')){
                $vendor = Vendor::find(Auth::guard('admin')->user()->vendor_id);
   
                $vendor->name = $request->name;
                $vendor->adress = $request->adress;
                $vendor->city = $request->city;
                $vendor->state = $request->state;
                $vendor->country = $request->country;
                $vendor->pincode = $request->pincode;
                $vendor->mobile = $request->mobile;
                $vendor->save(); 
                
                $admin = Admin::find(Auth::guard('admin')->user()->id);
                $admin->name = $request->name;
                $admin->mobile = $request->mobile;
                $admin->save();
    
                return redirect()->back()->with('msg','Vendor Details are Updated Successfully');

            }
           

    $vendorDetails = Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->first();
  
  
   

        }

        if($slug == 'bussiness'){
        
            if($request->isMethod('post')){
                $vendor = VendorBussinessDetail::find(Auth::guard('admin')->user()->vendor_id);
                   
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $imagePath = $filename;
            
                   
                     $file->move(public_path('admin/vendor'), $filename);
            
                    // Update the admin's image field with the image path
                    $vendor->address_proof_image = $imagePath;
                }

                $vendor->sname = $request->sname;
                $vendor->saddress = $request->saddress;
                $vendor->scity = $request->scity;
                $vendor->sstate = $request->sstate;
                $vendor->scountry = $request->scountry;
                $vendor->spincode = $request->spincode;
                $vendor->smobile = $request->smobile;
                $vendor->swebsite = $request->swebsite;
                $vendor->bussiness_license_number = $request->bussiness_license_number;
                $vendor->gst_number = $request->gst_number;
                $vendor->pan_number = $request->pan_number;
                $vendor->address_proof = $request->address_proof;
                $vendor->save(); 
                
                $admin = Admin::find(Auth::guard('admin')->user()->id);
                $admin->name = $request->name;
                $admin->mobile = $request->mobile;
                $admin->save();
    
                return redirect()->back()->with('msg','Vendor Details are Updated Successfully');

            }     

        $vendorDetails = VendorBussinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first();


        
        }

        if($slug == 'bank'){
           if($request->isMethod('post')){
            
            $request->validate([
                'account_holder_name' => 'required',
                // ... other validation rules ...
            ]);
            $vendor =  VendorBankDetail::find(Auth::guard('admin')->user()->vendor_id);
            $vendor->account_holder_name = $request->account_holder_name;
            $vendor->bank_name = $request->bank_name;
            $vendor->account_number = $request->account_number;
            $vendor->bank_ifsc_code = $request->bank_ifsc_code;
            $vendor->save();

            return redirect()->back()->with('msg','Vendor Details are Updated Successfully');


           }
           
            $vendorDetails = VendorBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first();

        }
       $countries = Country::where('status',1)->get();
              
        return view('admin.vendorUpdate')->with(compact('slug','vendorDetails','countries'));
     } 
     
     function admin($type = null, Request $request){
        //   dd($type);
       if(!empty($type)){
        if($type == 'admins'){
            $admin = Admin::all();
            return view('admin.admins')->with(compact('admin'));
        }
          $admin = Admin::where('type',$type)->get();
          return view('admin.admins')->with(compact('admin'));
       }   

     }

     function viewVendorDetails($id){
          $vendorDetails = Admin::with('Vendor','VendorBussinessDetail','VendorBankDetail')->where('id',$id)->first();
        return view('admin.completeVendorDetails')->with(compact('vendorDetails'));
     }

     function updateStatus(Request $request){
          if($request->ajax()){
            // dd($request->all());
            if ($request->val == 'Active'){
                 $val = 0;
            }else{
                $val = 1;
            }
            Admin::where('id', $request->id)->update(['role' => $val]);
            return response()->json(['val'=> $val]);
          }
     }
    

    
}