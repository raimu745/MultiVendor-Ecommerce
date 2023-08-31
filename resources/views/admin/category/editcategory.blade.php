@extends('admin.layouts.app')

@section('content')
<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Category</h4>
                
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
                  <form class="forms-sample" action="{{url('updatecategory',$category->id)}}" method="Post" enctype="multipart/form-data">@csrf
                  
                   
                    <div class="form-group">
                      <label >Category Name</label>
                      <input type="text" class="form-control" id="cname" name="cname" placeholder="Name" value="{{$category->cname}}" >
                      @error('name')
                      <div class="text-danger">
                      {{$message}}
                      </div>    
                      @enderror
                    </div>
                    <div class="form-group">
                      <label >Section Name</label>
                     <select name="section_id" id="section_id" class="form-control">
                       @foreach($sections as $section)
                       @if($category->section_id == $section->id)
                       <option value="{{$section->id}}" selected>{{$section->name}}</option>
                       @else
                       <option value="{{$section->id}}">{{$section->name}}</option>
                       @endif
                       @endforeach
                     </select>
                    </div>
                    
                    <div class="form-group">
                      <label >Category Level</label>
                     <select name="parent_id" id="categorySelect" class="form-control">
                     @foreach($categories as $categories)
                     @if($category->parent_id == $categories->id)
                     <option value="{{$categories->id}}" selected>{{$categories->cname}}</option>
                     @else
                     <option value="{{$categories->id}}">{{$categories->cname}}</option>
                     @endif
                     @endforeach
                     </select>
                    </div>
                    
                    <div class="form-group">
                      <label >Category Discount</label>
                      <input type="text" class="form-control" id="cdiscount" name="cdiscount" placeholder="Category Discount" value="{{$category->cdiscount}}">
                    </div>
                    <div class="form-group">
                      <label >Category description</label>
                      <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="form-group">
                      <label >Category Url</label>
                      <input type="text" class="form-control" id="url" name="url" placeholder="Category Url" value="{{$category->url}}">
                    </div>
                    <div class="form-group">
                      <label >Meta Title</label>
                      <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title" value="{{$category->meta_title}}">
                    </div> 
                    <div class="form-group">
                      <label >Meta Description</label>
                      <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="{{$category->meta_description}}">
                    </div>
                    <div class="form-group">
                      <label >Meta Keyword</label>
                      <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Meta Keyword" value="{{$category->meta_keyword}}">
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