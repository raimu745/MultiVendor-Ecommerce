@extends('admin.layouts.app')

@section('content')
<div class="col-md-12 grid-margin stretch-card my-5">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Products</h4>
                
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
                  <form class="forms-sample" action="{{url('addproducts')}}" method="Post" enctype="multipart/form-data">@csrf
                  
                   
                    <div class="form-group">
                      <label for="category_id">Select Category</label>
                     <select name="category_id" id="category_id" class="form-control">
                       <option value="">Select</option>
                        @foreach ($category as $section)
                       <optgroup label="{{$section->name}}" style="color:#000"></optgroup>
                       @foreach ($section->category as $category)
                       <option value="{{$category->id}}">--&nbsp;{{$category->cname}}</option>
                       @foreach ($category->subcategory as $subcategory)
                       <option value="{{$subcategory->id}}">----&nbsp;{{$subcategory->cname}}</option>
                       @endforeach
                       @endforeach
                       @endforeach
                     </select>
                    </div>

                    <div class="form-group">
                      <label for="brand_id">Select Brand</label>
                     <select name="brand_id" id="brand_id" class="form-control">
                       <option value="">Select</option>
                        @foreach ($brands as $brand)
                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                      
                       @endforeach
                     </select>
                    </div>
            
                <div class="form-group">
                <label>Product Name</label>
                <input type="text" class="form-control" id="pname" name="pname" placeholder="Name"> 
                </div>
                <div class="form-group">
                <label>Product Code</label>
                <input type="text" class="form-control" id="pcode" name="pcode" placeholder="Code"> 
                </div>
                <div class="form-group">
                <label>Product Color</label>
                <input type="text" class="form-control" id="pcolor" name="pcolor" placeholder="Color"> 
                </div>
                <div class="form-group">
                <label>Product Price</label>
                <input type="text" class="form-control" id="pprice" name="pprice" placeholder="Price"> 
                </div>
                <div class="form-group">
                <label>Product Discount (%) </label>
                <input type="text" class="form-control" id="pdiscount" name="pdiscount" placeholder="Product Discount"> 
                </div>
                <div class="form-group">
                <label>Product Weight</label>
                <input type="text" class="form-control" id="pweight" name="pweight" placeholder="Product Weight"> 
                </div>
                <div class="form-group">
                <label>Product Image</label>
                <input type="file" class="form-control" id="pweight" name="pimage"> 
                </div>
                <div class="form-group">
                <label>Product Video</label>
                <input type="file" class="form-control" id="pweight" name="pvideo" accept="video/*"> 
                </div>
                <div class="form-group">
                <label>Product Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Product Weight"> 
                </div>
                <div class="form-group">
                <label>Meta Title</label>
                <input type="text" class="form-control" id="pweight" name="meta_title" placeholder="Product Weight"> 
                </div>
                <div class="form-group">
                <label>Meta Description</label>
                <input type="text" class="form-control" id="pweight" name="meta_description" placeholder="Meta Description"> 
                </div>
                <div class="form-group">
                <label>Meta Keyword</label>
                <input type="text" class="form-control" id="pweight" name="meta_keyword" placeholder="Meta Keyword"> 
                </div>
                <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="isfeatured" name="isfeatured" value="yes"> 
                    <label class="form-check-label" for="isfeatured">Is Featured</label>
                </div>
            </div>

                            
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
@endsection