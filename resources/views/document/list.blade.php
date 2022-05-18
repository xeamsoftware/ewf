@extends('layouts.master') 

@section('content')


<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
        <!-- Row -->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Document/Lists</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                    <tr>
                                    <th>Sr.</th>
                                    <th>Name</th>
                                    <th>Type</th>                                                                     
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php($count = 0)
                                    @foreach($document_list as $list)
                                        @php($count++)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $list->name }}</td>                                                                                                           
                                        <td>{{ $list->type }}</td> 
                                        <td>
                                        <a href="{{ route('document.edit',$list->id) }}" class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
										<a onclick="return myFunction();" href="{{ route('document.delete',$list->id) }}" class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                        <!-- <a class="btn btn-sm btn-secondary" href="{{ route('document.view',$list->id) }}"><i class="fa fa-info-circle"></i> Details</a>                                                                                 -->
                                        </td>
                                    </tr>
                                    @endforeach
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
  function myFunction() {
      if(!confirm("Are You Sure to delete this list"))
      event.preventDefault();
  }
 </script>
@endsection


