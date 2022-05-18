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
                        <h3 class="card-title">Incentive/Details</h3>
                        <div class="ms-auto pageheader-btn">
                            <a href="{{ route('incentive.list') }}" class="btn btn-success btn-icon text-white">
                                <span>
                                    <i class="fe fe-log-in"></i>
                                </span> Back
                            </a>
                        </div>
                    </div>
                    @foreach($incentive_view as $view)
                   
                    <div class="card">

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Name</h5>
                                    <h6 class="text-dark mb-1">{{$view->name}}</h6>                     
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">From Amount</h5>
                                    <h6 class="text-dark mb-1">{{$view->from}}</h6>                     
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">To Amount</h5>
                                    <h6 class="text-dark mb-1">{{$view->to}}</h6>                     
                                </div>
                            </div>             
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Percentage</h5>
                                    <h6 class="text-dark mb-1">{{$view->percentage}}</h6>                     
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Status</h5>
                                    @if($view->status) 
                                        <h6 class="text-dark mb-1">{{$view->status}}</h6>
                                    @else 
                                        <h6 class="text-dark mb-1">In Active</h6>   
                                    @endif
                                </div>                                
                            </div>             
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <h5 class="mb-3">Note</h5>
                                    <h6 class="text-dark mb-1">{{$view->incentive_note}}</h6>                     
                                </div>                                                              
                            </div>             
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        <!-- End Row -->
        </div>
        <!-- PAGE-HEADER END -->
    </div>
</div> 

@endsection


