@extends('admin.layouts.app')

@section('content')
<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Admin Password</h4>
                
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
                  <form class="forms-sample" action="{{url('updatepass')}}" method="Post">@csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username/type</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" value="{{Auth::guard('admin')->user()->type}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{Auth::guard('admin')->user()->email}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Current Password</label>
                      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Current Password" >
                      @error('cpassword')
                      <div class="text-danger">
                      {{$message}}
                      </div>    
                      @enderror
                      <span id="msgpass"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">New Password</label>
                      <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password" name="new_password">
                      @error('new_password')
                      <div class="text-danger">
                      {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Confirm Password</label>
                      <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password" name="password_confirmation">
                      @error('password_confirmation')
                      <div class="text-danger">
                      {{$message}}
                    </div>
                    @enderror
                    </div>
                   
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
@endsection