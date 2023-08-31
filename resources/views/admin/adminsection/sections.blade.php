@extends('admin.layouts.app')

@section('content')



<div class="container mt-5">
    <div class="row">
        
<div class="col-lg-12 grid-margin stretch-card">

              <div class="card">
             
                <div class="card-body">
                  <h4 class="card-title">Bordered table</h4>
                  <a href="{{url('/addSection')}}" class="btn btn-sm btn-primary">Add Section</a>
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
                  
               @foreach ($sections as $section)
                        <tr>
                          <td>
                            {{$section->id}}
                          </td>
                          <td>
                          {{$section->name}}
                          </td>                            
                          <td>
                            @if ($section->status == 1)
                            <a href="javascript:void(0)" id="{{$section->id}}" class="status test"> Active </a>
                          
                            @else
                            <a href="javascript:void(0)" id="{{$section->id}}" class="status stest"> Inactive </a>  
                           @endif
                          </td>
                          <td>
 <a href="{{url('/editSection',$section->id)}}"  class="btn btn-sm btn-success editSection"  id="{{ $section->id }}"  >Edit</a>
 <a href="{{url('adminSectionDelete',$section->id)}}" class="btn btn-sm btn-danger" >Delete</a>
                          </td>
                        
                        </tr>
                       
                    @endforeach    
                        
                        <!-- modal -->



<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Section</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="forms-sample" action="{{url('updateSection',$section->id)}}" method="Post">@csrf
                  
      <input type="hidden" id="hEdit"> 
                  <div class="form-group">
                    <label for="cpassword">Section Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name " >
                    @error('name')
                    <div class="text-danger">
                    {{$message}}
                    </div>    
                    @enderror
                  </div>
                          
<button type="submit" class="btn btn-primary mr-2" id="update">Update</button>
                </form>
      </div>
    
    </div>
  </div>
</div>
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
</div>
@endsection