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
                  <form class="forms-sample" action="{{url('addimages',$products->id)}}" method="Post" enctype="multipart/form-data">@csrf
                  
                   
                    

                    
            

                <div class="form-group">
                <label>Product Name</label><br>
                {{$products->pname}}
                </div>
                <div class="form-group">
                <label>Product Code</label><br>
                {{$products->pcode}}
                </div>
                <div class="form-group">
                <label>Product Color</label><br>
                {{$products->pcolor}}
                </div>
                <div class="form-group">
                <label>Product Price</label><br>
                 {{$products->pprice}}
                </div>
                                
                <div class="form-group">
                <label>Product Image</label><br>
                @if(!empty($products->pimage))
                       
                       <img src="{{ asset('admin/product/' .$products->pimage )}}"  width="130" height="130" alt="">
                                          @else
                     <img src="{{ asset('admin/images/no-img.png')}}" width="130" height="130" alt="">
                                         
                                         @endif
                </div>


               <div class="form-group">
               <div class="field_wrapper">
              <input type="file" name="images[]" multiple class="form-control">
              </div>
               

               </div>                            
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>

            <!-- Images table -->
         
            <div class="col-lg-12 grid-margin stretch-card">

              <div class="card">
             
                <div class="card-body">
                    <h1>Images Table</h1>
                  <div class="table-responsive pt-3">
  
                  @if ($products)
                  <table id="products" class="table table-bordered ">
    <thead>
        <tr>
            <th>#Id</th>
            <th>Images</th>
            <th>Status</th>
            <th>Actions</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($products->productimage as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>
              <img src="{{url('admin/productimage/'.$product->images)}}" alt="">
            </td>
            
            <td>
                @if ($product->status == 1)
                <a href="javascript:void(0)" id="{{$product->id}}" class="status test">Active</a>
                @else
                <a href="javascript:void(0)" id="{{$product->id}}" class="status stest">Inactive</a>
                @endif
            </td>
            <td>
              <a href="{{url('productimageDelete',$product->id)}}" class="btn btn-sm btn-primary">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table><br><br><br>

@else
                <p>No products found with ID {{$product->id}}</p>
@endif

                  </div>
                </div>
              </div>
            </div>
            </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection