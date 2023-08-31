@extends('admin.layouts.app')

@section('content')



<div class="container mt-5">
    <div class="row">
        
<div class="col-lg-12 grid-margin stretch-card">

              <div class="card">
             
                <div class="card-body">
                  <h4 class="card-title">Bordered table</h4>
                  <a href="{{url('/addCategory')}}" class="btn btn-sm btn-primary">Add Section</a>
                  <div class="table-responsive pt-3">
                    <table id="example" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #Id
                          </th>
                          <th>
                          Category Name
                          </th>
                          <th>
                          Section 
                          </th>
                          <th>
                            Parent Category
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
                  
               @foreach ($categories as $category)
                        <tr>
                          <td>
                            {{$category->id}}
                          </td>
                          <td>
                          {{$category->cname}}
                          </td>
                          <td>
                          {{$category->section->name}}
                          </td>
                          <td>
                         @if (isset($category->parentCategory->cname) && !empty($category->parentCategory->cname))
                             <?= $parent_category = $category->parentCategory->cname; ?>
                         @else
                         <?= $parent_category = "Root"; ?>
                         @endif
                          </td>                             
                          <td>
                            @if ($category->status == 1)
                            <a href="javascript:void(0)" id="{{$category->id}}" class="status test"> Active </a>
                          
                            @else
                            <a href="javascript:void(0)" id="{{$category->id}}" class="status stest"> Inactive </a>  
                           @endif
                          </td>
                          <td>
 <a href="{{url('/editcategory',$category->id)}}"  class="btn btn-sm btn-success editcategory"  id="{{ $category->id }}"  >Edit</a>
 <a href="{{url('categorydelete',$category->id)}}" class="btn btn-sm btn-danger" >Delete</a>
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