@extends('admin.layouts.app')

@section('content')


@if ($slug == 'personal')
<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Vendor Personal details</h4>
                
                  @if(Session::has('msg'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session('msg')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif  

                  @if(Session::has('error'))
                  
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{Session('error')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                 
                  @endif
                  <form class="forms-sample" action="{{url('vendorUpdate/personal')}}" method="Post" enctype="multipart/form-data">@csrf
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{Auth::guard('admin')->user()->email}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $vendorDetails->name}}" >
                      @error('name')
                      <div class="text-danger">
                      {{$message}}
                      </div>    
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Address</label>
                      <input type="text" class="form-control" id="adress" name="adress" placeholder="Add Your Address" value="{{ $vendorDetails->adress}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Add Your City" value="{{ $vendorDetails->city}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">State</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="Add Your State" value="{{ $vendorDetails->state}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Country</label>
                      <!-- <input type="text" class="form-control" id="country" name="country" placeholder="Add Your Mobile Number" value="{{ $vendorDetails->country}}"> -->
                  <select name="country" id="country" class="form-control" style="color: #000;">
                    @foreach ($countries as $country)
                    <option value="{{$country->country_name}}" {{ $country->country_name == $vendorDetails->country ? 'selected' : '' }} >{{$country->country_name}}</option>
                    @endforeach
                  </select>

                    </div>
                    <div class="form-group">
                      <label for="cpassword">Pincode</label>
                      <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Add Your Mobile Number" value="{{ $vendorDetails->pincode}}">
                    </div>

                    <div class="form-group">
                      <label for="cpassword">Mobile</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Add Your Mobile Number" value="{{ $vendorDetails->mobile}}">
                    </div>


            <!-- <div class="form-group">
            <label>Admin Image</label>
            <input type="file" class="form-control" id="image" name="image" >
           {{Auth::guard('admin')->user()->image}}
            @if(!empty(Auth::guard('admin')->user()->image))
        <a href="{{ asset( Auth::guard('admin')->user()->image) }}" target="_blank">View Image</a><br>
             <img src="{{ asset( Auth::guard('admin')->user()->image) }}" width="70" height="70" alt="">
            @endif  
            </div> -->
                    
                   
                   
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>

   @elseif ($slug == 'bussiness')  
   <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Vendor Bussiness Details</h4>
                
                  @if(Session::has('msg'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session('msg')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif  

                  @if(Session::has('error'))
                  
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{Session('error')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                 
                  @endif
                  <form class="forms-sample" action="{{url('vendorUpdate/bussiness')}}" method="Post" enctype="multipart/form-data">@csrf
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{Auth::guard('admin')->user()->email}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Shop Name</label>
                      <input type="text" class="form-control" id="sname" name="sname" placeholder="Shop Name" value="{{$vendorDetails->sname}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Shop Address</label>
                      <input type="text" class="form-control" id="saddress" name="saddress" placeholder="Shop Address" value="{{$vendorDetails->saddress}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Shop City</label>
                      <input type="text" class="form-control" id="scity" name="scity" placeholder="Shop City" value="{{$vendorDetails->scity}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Shop State</label>
                      <input type="text" class="form-control" id="sstate" name="sstate" placeholder="Shop State" value="{{$vendorDetails->sstate}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Shop Country</label>
                      <!-- <input type="text" class="form-control" id="scountry" name="scountry" placeholder="Shop Country" value="{{$vendorDetails->scountry}}"> -->

                  <select name="scountry" id="scountry" class="form-control" style="color: #000;">
                    @foreach ($countries as $country)
                    <option value="{{$country->country_name}}" {{ $country->country_name == $vendorDetails->scountry ? 'selected' : '' }} >{{$country->country_name}}</option>
                    @endforeach
                  </select>
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Shop Pincode</label>
                      <input type="text" class="form-control" id="spincode" name="spincode" placeholder="Shop Country" value="{{$vendorDetails->spincode}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Mobile</label>
                      <input type="text" class="form-control" id="smobile" name="smobile" placeholder="Add Your Mobile Number" value="{{$vendorDetails->smobile}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Shop Website</label>
                      <input type="text" class="form-control" id="swebsite" name="swebsite" placeholder="Add Your Website" value="{{$vendorDetails->swebsite}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Gst Number</label>
                      <input type="text" class="form-control" id="gst_number" name="gst_number" placeholder="Add Your Gst Number" value="{{$vendorDetails->gst_number}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Pan Number</label>
                      <input type="text" class="form-control" id="pan_number" name="pan_number" placeholder="Add Your Pan Number" value="{{$vendorDetails->pan_number}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Bussiness License Number</label>
                      <input type="text" class="form-control" id="bussiness_license_number" name="bussiness_license_number" placeholder="Add Your Bussiness License Number" value="{{$vendorDetails->bussiness_license_number}}">
                    </div>     
                    <div class="form-group">
                      <label for="cpassword">Address Proof</label>
                      <select name="address_proof" id="" class="form-control">
<option value="Passport" @if($vendorDetails->address_proof === 'Passport') selected @endif> Passport</option>
<option value="Cnic" @if($vendorDetails->address_proof === 'Cnic') selected @endif>Cnic</option>
<option value="License card" @if($vendorDetails->address_proof === 'License card') selected @endif>License card</option>
<option value="Carona Card" @if($vendorDetails->address_proof === 'Carona Card') selected @endif>Carona Card</option>
                      </select>
                    </div>

            <div class="form-group">
            <label>Address Proof Image</label>
            <input type="file" class="form-control" id="image" name="image" ><br>
                       
<img src="{{ asset('admin/vendor/'. $vendorDetails->address_proof_image) }}" width="70" height="70" alt=""> <br>
  <a href="{{ asset('admin/vendor/'. $vendorDetails->address_proof_image) }}" target="_blank">View Image</a>         
            </div>
                    
                   
                   
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
      @elseif($slug == 'bank')
      <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Vendor Bank Details</h4>
                
                  @if(Session::has('msg'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session('msg')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif  

                  @if(Session::has('error'))
                  
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{Session('error')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                 
                  @endif
                  <form class="forms-sample" action="{{url('vendorUpdate/bank')}}" method="Post" enctype="multipart/form-data">@csrf
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{Auth::guard('admin')->user()->email}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Account Holder Name</label>
                      <input type="text" class="form-control" id="account_holder_name" name="account_holder_name" placeholder="Account Holder Name" value = "{{$vendorDetails->account_holder_name}}" >
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Bank Name</label>
                      <input type="text" class="form-control" id="name" name="bank_name" placeholder="Name " value = "{{$vendorDetails->bank_name}}" >
                    </div>  
                    <div class="form-group">
                      <label for="cpassword">Account Number</label>
                      <input type="text" class="form-control" id="mobile" name="account_number" placeholder="Add Your Mobile Number" value= "{{$vendorDetails->account_number}}">
                    </div> 
                      <div class="form-group">
                      <label for="cpassword">Bank Ifsc Code</label>
                      <input type="text" class="form-control" id="mobile" name="bank_ifsc_code" placeholder="Add Your Mobile Number" value= "{{$vendorDetails->bank_ifsc_code}}">
                    </div>                              
                                      
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
   @endif
   
   
@endsection