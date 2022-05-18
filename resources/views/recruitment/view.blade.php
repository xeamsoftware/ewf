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
                        <h3 class="card-title">Recruitment/Details</h3>
                        <div class="ms-auto pageheader-btn">
                            <a href="{{ route('recruitment.list') }}" class="btn btn-success btn-icon text-white">
                                <span>
                                    <i class="fe fe-log-in"></i>
                                </span> Back
                            </a>
                        </div>
                    </div>
                    @foreach($recruitmentView as $view)

                    <div class="card">

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Name</h5>
                                    <h6 class="text-dark mb-1">{{$view->name}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Email</h5>
                                    <h6 class="text-dark mb-1">{{$view->email}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Phone Number</h5>
                                    <h6 class="text-dark mb-1">{{$view->phone_number}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Employee Code</h5>
                                    <h6 class="text-dark mb-1">{{$view->employee_code}}</h6>
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
                                    <h6 class="text-dark mb-1">{{$view->note}}</h6>
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