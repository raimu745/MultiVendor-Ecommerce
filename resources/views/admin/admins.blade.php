@extends('admin.layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bordered table</h4>
                
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #Id
                          </th>
                          <th>
                           Name
                          </th>
                          <th>
                            Type
                          </th>
                          <th>
                            Mobile
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Image 
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
                  
               @foreach ($admin as $admin)
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            {{$admin->name}}
                          </td>
                          <td>
                            {{$admin->type}}
                          </td>
                          <td>
                            {{$admin->mobile}}
                          </td>
                          <td>
                            {{$admin->email}}
                          </td>
                          <td>
            <img src="" alt="" width="70" height="70">
                          </td>
                          <td>
                            @if ($admin->role == 1)
                          <a href="javascript:void(0)" id="{{$admin->id}}" class="status test"> Active </a>
                          
                            @else
                        
                           <a href="javascript:void(0)" id="{{$admin->id}}" class="status stest"> Inactive </a> 
                          
                           @endif
                          </td>
                         <td>
                          @if($admin->type == 'vendorr')
                          <a href="{{url('/viewVendorDetails/'.$admin->id)}}">View Details</a>
                          @endif
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