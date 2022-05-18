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
                        <h3 class="card-title">Company/Details</h3>
                        <div class="ms-auto pageheader-btn">
                            <a href="{{ route('company.list') }}" class="btn btn-success btn-icon text-white">
                                <span>
                                    <i class="fe fe-log-in"></i>
                                </span> Back
                            </a>
                        </div>
                    </div>
                    @foreach($viewData as $view)
                   
                    <div class="card">

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Name</h5>
                                    <h6 class="text-dark mb-1">{{$view->company_name}}</h6>                     
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Address</h5>
                                    <h6 class="text-dark mb-1">{{$view->company_address}}</h6>                     
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">State Of Incorporation</h5>
                                    <h6 class="text-dark mb-1">{{$view->incorporation}}</h6>                     
                                </div>
                            </div>             
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Federal Tax Id</h5>
                                    <p class="text-dark mb-1">{{$view->federal_tax}}</h6p>                     
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Signing Authority Name</h5>
                                    <h6 class="text-dark mb-1">{{$view->authority_name}}</h6>                     
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Designation</h5>
                                    <h6 class="text-dark mb-1">{{$view->disignation}}</h6>                     
                                </div>                               
                            </div>             
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Phone No</h5>
                                    <p class="text-dark mb-1">{{$view->phone}}</h6p>                     
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Fax No</h5>
                                    <h6 class="text-dark mb-1">{{$view->fax_no}}</h6>                     
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Company Email Address</h5>
                                    <h6 class="text-dark mb-1">{{$view->company_email}}</h6>                     
                                </div>                               
                            </div>             
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Account Name</h5>
                                    <p class="text-dark mb-1">{{$view->account_name}}</h6p>                     
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Account Email Address</h5>
                                    <h6 class="text-dark mb-1">{{$view->account_email}}</h6>                     
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Account Phone Number</h5>
                                    <h6 class="text-dark mb-1">{{$view->account_phone}}</h6>                     
                                </div>                               
                            </div>             
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Sales Name</h5>
                                    <p class="text-dark mb-1">{{$view->sales_name}}</h6p>                     
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Sales Email Address</h5>
                                    <h6 class="text-dark mb-1">{{$view->sales_email}}</h6>                     
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Sales Phone Number</h5>
                                    <h6 class="text-dark mb-1">{{$view->sales_phone}}</h6>                     
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


