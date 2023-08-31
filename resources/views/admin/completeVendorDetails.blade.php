@extends('admin.layouts.app')

@section('content')


<div class="container mt-5">
    <div class="row">
    <a href="{{url('admin/vendorr')}}" >Back</a>
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
              
                <div class="card-body">
                  <h4 class="card-title">Vendor Personal details</h4>
           
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{$vendorDetails->vendor->email}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$vendorDetails->vendor->name}}" >
                      @error('name')
                      <div class="text-danger">
                      {{$message}}
                      </div>    
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Address</label>
                      <input type="text" class="form-control" id="adress" name="adress" placeholder="Add Your Address" value="{{$vendorDetails->vendor->adress}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Add Your City" value="{{$vendorDetails->vendor->city}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">State</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="Add Your State" value="{{$vendorDetails->vendor->state}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="Add Your Mobile Number" value="{{$vendorDetails->vendor->country}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Pincode</label>
                      <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Add Your Mobile Number" value="{{$vendorDetails->vendor->pincode}}">
                    </div>

                    <div class="form-group">
                      <label for="cpassword">Mobile</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Add Your Mobile Number" value="{{$vendorDetails->vendor->mobile}}">
                    </div>

      </div>
    </div>
</div>

<!-- bussiness details vendor -->

<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Vendor Bussiness details</h4>
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{$vendorDetails->vendor->email}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Shop Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$vendorDetails->VendorBussinessDetail->sname}}" >
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Address</label>
                      <input type="text" class="form-control" id="adress" name="adress" placeholder="Add Your Address" value="{{$vendorDetails->VendorBussinessDetail->saddress}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Add Your City" value="{{$vendorDetails->VendorBussinessDetail->scity}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">State</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="Add Your State" value="{{$vendorDetails->VendorBussinessDetail->sstate}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="Add Your Mobile Number" value="{{$vendorDetails->VendorBussinessDetail->scountry}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Pincode</label>
                      <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Add Your Mobile Number" value="{{$vendorDetails->VendorBussinessDetail->spincode}}">
                    </div>

                    <div class="form-group">
                      <label for="cpassword">Mobile</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Add Your Mobile Number" value="{{$vendorDetails->VendorBussinessDetail->smobile}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Website</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Add Your Mobile Number" value="{{$vendorDetails->VendorBussinessDetail->swebsite}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Address Proof</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Add Your Mobile Number" value="{{$vendorDetails->VendorBussinessDetail->address_proof}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Address Proof Image</label>
                <img src="{{ asset('admin/vendor/'. $vendorDetails->VendorBussinessDetail->address_proof_image) }}" width="200" height="70" alt="">      
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Bussiness License Number</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Add Your Mobile Number" value="{{$vendorDetails->VendorBussinessDetail->bussiness_license_number}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Gst Number</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Add Your Mobile Number" value="{{$vendorDetails->VendorBussinessDetail->gst_number}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Pan Number</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Add Your Mobile Number" value="{{$vendorDetails->VendorBussinessDetail->pan_number}}">
                    </div>

      </div>
    </div>
</div>
   

</div>
</div>
<!-- vendor bank details -->
   
<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Vendor Bank details</h4>
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{$vendorDetails->vendor->email}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">account_holder_name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$vendorDetails->VendorBankDetail->account_holder_name}}" >
                    </div>
                    <div class="form-group">
                      <label for="cpassword">bank_name</label>
                      <input type="text" class="form-control" id="adress" name="adress" placeholder="Add Your Address" value="{{$vendorDetails->VendorBankDetail->bank_name}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">account_number</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Add Your City" value="{{$vendorDetails->VendorBankDetail->account_number}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">bank_ifsc_code</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="Add Your State" value="{{$vendorDetails->VendorBankDetail->bank_ifsc_code}}">
                    </div>
                  

      </div>
    </div>
</div>

@endsection