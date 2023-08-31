@extends('admin.layouts.app')

@section('content')



<div class="container mt-5">
    <div class="row">
        
<div class="col-lg-12 grid-margin stretch-card">

              <div class="card">
             
                <div class="card-body">
                  <h4 class="card-title">Bordered table</h4>
                  <a href="{{url('/addbrand')}}" class="btn btn-sm btn-primary">Add Brand</a>
                  <div class="table-responsive pt-3">
                    <table id="example" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #Id
                          </th>
                          <th>
                           Name
                          </th>
                          <th>
                            Status
                          </th>
                         
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                  
               @foreach ($brands as $brand)
                        <tr>
                          <td>
                            {{$brand->id}}
                          </td>
                          <td>
                          {{$brand->name}}
                          </td>                            
                          <td>
                            @if ($brand->status == 1)
                            <a href="javascript:void(0)" id="{{$brand->id}}" class="status test"> Active </a>
                          
                            @else
                            <a href="javascript:void(0)" id="{{$brand->id}}" class="status stest"> Inactive </a>  
                           @endif
                          </td>
                          <td>
 <a href="{{url('/editbrand',$brand->id)}}"  class="btn btn-sm btn-success">Edit</a>
 <a href="{{url('branddelete',$brand->id)}}" class="btn btn-sm btn-danger" >Delete</a>
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
@endsection