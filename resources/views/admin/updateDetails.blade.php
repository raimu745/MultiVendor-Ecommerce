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
                  <form class="forms-sample" action="{{url('addUpdateDetails')}}" method="Post" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username/type</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" value="{{Auth::guard('admin')->user()->type}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{Auth::guard('admin')->user()->email}}">
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name " >
                      @error('name')
                      <div class="text-danger">
                      {{$message}}
                      </div>    
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="cpassword">Mobile</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Add Your Mobile Number" >
                      @error('mobile')
                      <div class="text-danger">
                      {{$message}}
                      </div>    
                      @enderror
                    </div>

            <div class="form-group">
            <label>Admin Image</label>
            <input type="file" class="form-control" id="image" name="image" >
           {{Auth::guard('admin')->user()->image; }} 
            @if(!empty(Auth::guard('admin')->user()->image))
            <a href="{{ asset('storage/' . Auth::guard('admin')->user()->image) }}">View Image</a>
             <img src="{{ asset(Auth::guard('admin')->user()->image) }}" width="70" height="70" alt="">
            @endif  
            </div>
                    
                   
                   
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
@endsection