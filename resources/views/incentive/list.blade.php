@extends('layouts.master') 

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  /> -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
        <!-- Row -->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Incentive/Lists</h3>
                        <div class="ms-auto pageheader-btn">
                           <h3 class="card-title">Sort By:</h3><br>                            
                            <select name="status" id="incentiveStatus" class="form-control custom-control">
                                <option value="">Select status</option>
                                <option value="">All</option>
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                    <tr>
                                    <th>Sr.</th>
                                    <th>Name</th>
                                    <th>From Amount</th>
                                    <th>To Amount</th>
                                    <th>Status</th> 
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="incentive-list-data">
                                @php($count = 0)
                                    @foreach($incentive_list as $list)
                                        @php($count++)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->from }}</td>
                                        <td>{{ $list->to }}</td>
                                        <td>
                                            <label class="custom-switch">
                                                <input type="checkbox" name="custom-switch-checkbox" data-id="{{$list->id}}" class="toggle-class status-btn custom-switch-input" {{ $list->status ? 'checked' : '' }}>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </td>
                                        <td>
                                        <a href="{{ route('incentive.edit',$list->id) }}" class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
										<a onclick="return myFunction();" href="{{ route('incentive.delete',$list->id) }}" class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                        <a class="btn btn-sm btn-secondary" href="{{ route('incentive.view',$list->id) }}"><i class="fa fa-info-circle"></i> Details</a>                                                                                
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tbody class="incentive-filter-data">
                                </tbody>
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

<script>

// filter active and In Active
$(document).on('change','#incentiveStatus',function(){
    let status = $(this).val();
    // alert(status);
    $.ajax({
        type: "GET",
        url: '{{ url('/incentive') }}/incentive-filter',
        data: {'status': status},
        success: function(data){
            // console.log(data);
            $('.incentive-list-data').hide();
            $(".incentive-filter-data").html(data);
        }
    });
    
});
// change status 

    $(document).on('change','.toggle-class',function(){
    var status = $(this).prop('checked') == true ? 1 : 0; 
    var listId = $(this).data('id'); 
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ url('/incentive') }}/changeStatus',
        data: {'status': status, 'list_id': listId},
        success: function(data){
            console.log(data.success)
        }
    });
})

// delete incentive list
function myFunction() {
    if(!confirm("Are You Sure to delete this list"))
    event.preventDefault();
}
 </script>

@endsection


