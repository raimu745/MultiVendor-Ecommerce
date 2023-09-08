@extends('admin.layouts.app')

@section('content')



<div class="container mt-5">
    <div class="row">
        
<div class="col-lg-12 grid-margin stretch-card">

              <div class="card">
             
                <div class="card-body">
                  <h4 class="card-title">Bordered table</h4>
                  <a href="{{url('/addproducts')}}" class="btn btn-sm btn-primary">Add Products</a>
                  <div class="table-responsive pt-3">
                    <table id="products" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #Id
                          </th>
                          <th>
                         Product Name
                          </th>
                          <th>
                         Product code
                          </th>
                          <th>
                         Product color
                          </th>
                          <th>
                            Image
                          </th>
                          <th>
                            Video
                          </th>
                          <th>
                            Section
                          </th>
                          <th>
                            Category
                          </th>
                          <th>
                            Added By
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                           Product Video
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                  
               @foreach ($products as $product)
                        <tr>
                          <td>
                            {{$product->id}}
                          </td>
                          <td>
                          {{$product->pname}}
                          </td> 
                          <td>
                          {{$product->pcode}}
                          </td>
                          <td>
                          {{$product->pcolor}}
                          </td> 
                          <td>
                          @if(!empty($product->pimage))
                       
        <img src="{{ asset('admin/product/' .$product->pimage )}}"  width="130" height="130" alt="">
                           @else
      <img src="{{ asset('admin/images/no-img.png')}}" width="130" height="130" alt="">
                          
                          @endif
                          </td>
                          <td>
                          @if(!empty($product->pvideo))
                           
                          <video width="100" height="100" controls>
        <source src="{{ asset('admin/videos/product/' . $product->pvideo) }}" type="video/mp4">
      
    </video>


                          @else
                          <p>No video file available</p>               
                          @endif
                          </td>
                          <td>
                          {{ucfirst($product->section->name)}}
                          </td>
                          <td>
                          {{ucfirst($product->category->cname)}}
                          </td> 
                          <td>
                           
                          @if($product->admin_type == 'vendorr')
                            
                               <a href="{{url('/viewVendorDetails',$product->id)}}" target="_blank">{{$product->admin_type}}</a>
                          @else
                         
                          <a href="">{{$product->admin_type}}</a>
                          @endif     
                          </td>                           
                          <td>
                            @if ($product->status == 1)
                            <a href="javascript:void(0)" id="{{$product->id}}" class="status test"> Active </a>
                          
                            @else
                            <a href="javascript:void(0)" id="{{$product->id}}" class="status stest"> Inactive </a>  
                           @endif
                          </td>
                          <td>
                <a href="{{url('/editproduct',$product->id)}}"  class="btn btn-sm btn-success">Edit</a>
                <a href="{{url('deleteproducts',$product->id)}}" class="btn btn-sm btn-danger" >Delete</a>
                <a href="{{url('/addattribute',$product->id)}}"  class="btn btn-sm btn-success">Attribute</a>
                <a href="{{url('/addimages',$product->id)}}"  class="btn btn-sm btn-primary">Images</a>
                          </td>
                        
                        </tr>
                       
                    @endforeach    
                        
   
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
</div>
<br>
<br>
@endsection