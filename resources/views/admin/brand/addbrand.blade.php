@extends('admin.layouts.app')

@section('content')
<div class="col-md-12 grid-margin stretch-card my-5">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Brand</h4>
                
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
                  <form class="forms-sample" action="{{url('addbrand')}}" method="Post">@csrf
                  
                   
                    <div class="form-group">
                      <label for="cpassword">Brand Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" >
                      @error('name')
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