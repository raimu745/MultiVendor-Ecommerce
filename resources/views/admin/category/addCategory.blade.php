@extends('admin.layouts.app')

@section('content')
<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Category</h4>
                
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
                  <form class="forms-sample" action="{{url('addCategory')}}" method="Post" enctype="multipart/form-data">@csrf
                  
                   
                    <div class="form-group">
                      <label >Category Name</label>
                      <input type="text" class="form-control" id="cname" name="cname" placeholder="Name">
                      @error('name')
                      <div class="text-danger">
                      {{$message}}
                      </div>    
                      @enderror
                    </div>
                    <div class="form-group">
                      <label >Section Name</label>
                     <select name="section_id" id="section_id" class="form-control">
                     <option selected disabled>Select Section</option>
                        @foreach ($sections as $section)
                        <option value="{{$section->id}}">{{$section->name}}</option>
                        @endforeach
                     </select>
                    </div>

                    <div class="form-group">
                      <label >Category Level</label>
                     <select name="parent_id" id="categorySelect" class="form-control">
                        <option selected value="0">Main Category</option>
                     </select>
                    </div>
                    
                    <div class="form-group">
                      <label >Category Discount</label>
                      <input type="text" class="form-control" id="cdiscount" name="cdiscount" placeholder="Category Discount">
                    </div>
                    <div class="form-group">
                      <label >Category description</label>
                      <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label >Category Url</label>
                      <input type="text" class="form-control" id="url" name="url" placeholder="Category Url">
                    </div>
                    <div class="form-group">
                      <label >Meta Title</label>
                      <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title">
                    </div> 
                    <div class="form-group">
                      <label >Meta Description</label>
                      <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description">
                    </div>
                    <div class="form-group">
                      <label >Meta Keyword</label>
                      <input type="text" class="form-control" id="meta_description" name="meta_keyword" placeholder="Meta Keyword">
                    </div> 
                    <div class="form-group">
                      <label >Category Image</label>
                      <input type="file" class="form-control" id="cimage" name="cimage" >
                    </div>    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
@endsection