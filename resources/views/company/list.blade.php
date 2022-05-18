@extends('layouts.master') 

@section('style')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection

@section('content')

<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
        <!-- Row -->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Company/Lists</h3>                                                  
                        <div class="ms-auto pageheader-btn">
                           <h3 class="card-title">Sort By:</h3><br>                            
                            <select name="status" id="status" class="form-control custom-control">
                                <option value="">Select status</option>
                                <option value="">All</option>
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                        </div>
                    </div>
                    <!-- show success and unsuccess message -->
                    @if (session('success'))
                    <p class="alert alert-success text-center">{{ session('success') }}</p>
                    @endif
                    @if (session('unsuccess'))
                    <p class="alert alert-danger text-center">{{ session('unsuccess') }}</p>
                    @endif
                    <!-- End show success and unsuccess message -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                    <tr>
                                    <th>Sr.</th>
                                    <th>Name</th>
                                    <th>Phone No</th>
                                    <th>Designation</th> 
                                    <th>Status</th>                                                                     
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list-data">                                
                                @php($count = 0)
                                    @foreach($companyData as $list)
                                        @php($count++)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $list->company_name }}</td>
                                        <td>{{ $list->phone }}</td>
                                        <td>{{ $list->disignation }}</td>
                                        <td>
                                            <!-- <input data-id="{{$list->id}}" class="toggle-class status-btn" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="In Active" {{ $list->status ? 'checked' : '' }}> -->
                                            <label class="custom-switch">
                                                <input type="checkbox" name="custom-switch-checkbox" data-id="{{$list->id}}" class="toggle-class status-btn custom-switch-input" {{ $list->status ? 'checked' : '' }}>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        
                                        </td>                                                                                                                                                      
                                        <td>
                                        <a href="{{ route('company.edit',$list->id) }}" class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
										<a onclick="return myFunction();" href="{{ route('company.delete',$list->id) }}" class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                        <a class="btn btn-sm btn-secondary" href="{{ route('company.view',$list->id) }}"><i class="fa fa-info-circle"></i> Details</a>                                                                                
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <!-- filter list  -->
                                <tbody class="filter-data">                                
                                
                                </tbody>
                                <!-- end filter list -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <!-- End Row -->
        </div>
        <!-- PAGE-HEADER END -->
    </div>
</div> 
@endsection


@section('script')
<script>

// filter active and In Active
$(document).on('change','#status',function(){
    let status = $(this).val();
    // alert(status);
    $.ajax({
        type: "GET",
        url: '{{ url('/company') }}/filterStatus',
        data: {'status': status},
        success: function(data){
            // console.log(data);
            $('.list-data').hide();
            $(".filter-data").html(data);
        }
    });
    
});


// change status 

$(document).on('change','.toggle-class',function(){
    var status = $(this).prop('checked') == true ? 1 : 0; 
    var listId = $(this).data('id'); 
        // alert(user_id);
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ url('/company') }}/changeStatus',
        data: {'status': status, 'list_id': listId},
        success: function(data){
            console.log(data.success)
        }
    });
})
// delete list
  function myFunction() {
      if(!confirm("Are You Sure to delete this list"))
      event.preventDefault();
  }
 </script>

@endsection


