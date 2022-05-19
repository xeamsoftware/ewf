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
                        <h3 class="card-title">Consultant/Details</h3>
                        <div class="ms-auto pageheader-btn">
                            <a href="{{ route('consultant.list') }}" class="btn btn-success btn-icon text-white">
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
                                    <h5 class="mb-3">Placement Type</h5>
                                    <h6 class="text-dark mb-1">{{$view->placement_type}}</h6>
                                </div>
                            </div>
                        </div>
                        @if($view->placement_type == 'c2c')
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">

                                    <h6 class="mb-3">Client MSA
                                        <a href="{{asset('assets/upload/consultant/'.$view->client_msa)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i>
                                        </a>
                                    </h6>

                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Client Purchase order
                                        <a href="{{asset('assets/upload/consultant/'.$view->client_purchase_order)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Client Inssurance
                                        <a href="{{asset('assets/upload/consultant/'.$view->client_insurance)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Vendor MSA
                                        <a href="{{asset('assets/upload/consultant/'.$view->vendor_msa)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Vendor Purchase order
                                        <a href="{{asset('assets/upload/consultant/'.$view->vendor_purchase_order)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Vendor Inssurance
                                        <a href="{{asset('assets/upload/consultant/'.$view->vendor_insurance)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Vendor W9
                                        <a href="{{asset('assets/upload/consultant/'.$view->vendor_w9)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- w2 -->

                        @if($view->placement_type == 'w2')
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Offer Letter
                                        <a href="{{asset('assets/upload/consultant/'.$view->offer_letter_w2)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">W4 Form
                                        <a href="{{asset('assets/upload/consultant/'.$view->w4_form_w2)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i>
                                    </h6>
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">I9 Form
                                        <a href="{{asset('assets/upload/consultant/'.$view->I9_form_w2)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h6 class="mb-3">E-Verify Authorization
                                        <a href="{{asset('assets/upload/consultant/'.$view->e_verify_authorization_w2)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">ACH Form
                                        <a href="{{asset('assets/upload/consultant/'.$view->ach_form_w2)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Void Check
                                        <a href="{{asset('assets/upload/consultant/'.$view->void_check_w2)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Void Copy
                                        <a href="{{asset('assets/upload/consultant/'.$view->visa_copy_w2)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">ID Proof
                                        <a href="{{asset('assets/upload/consultant/'.$view->id_proof_w2)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- 1099 -->

                        @if($view->placement_type == '1099')
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Offer Letter
                                        <a href="{{asset('assets/upload/consultant/'.$view->offer_letter_1099)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">W4 Form
                                        <a href="{{asset('assets/upload/consultant/'.$view->w4_form_1099)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">I9 Form
                                        <a href="{{asset('assets/upload/consultant/'.$view->I9_form_1099)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h6 class="mb-3">ACH Form
                                        <a href="{{asset('assets/upload/consultant/'.$view->ach_form_1099)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Void Check
                                        <a href="{{asset('assets/upload/consultant/'.$view->void_check_1099)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Void Copy
                                        <a href="{{asset('assets/upload/consultant/'.$view->visa_copy_1099)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">

                                <div class="col-sm-4">
                                    <h6 class="mb-3">ID Proof
                                        <a href="{{asset('assets/upload/consultant/'.$view->id_proof_1099)}}" download><i class="fe fe-download" data-bs-toggle="tooltip" title="Download" data-bs-original-title="fe fe-download" aria-label="fe fe-download"></i></a>
                                    </h6>

                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Condidate Full Name</h5>
                                    <h6 class="text-dark mb-1">{{$view->full_name}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Current Location</h5>
                                    <h6 class="text-dark mb-1">{{$view->location}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Work Authorization</h5>
                                    <h6 class="text-dark mb-1">{{$view->work_authorization}}</h6>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Visa Expiray</h5>
                                    <h6 class="text-dark mb-1">{{$view->visa_expirary}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Contact Number</h5>
                                    <h6 class="text-dark mb-1">{{$view->contact_number}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Email</h5>
                                    <h6 class="text-dark mb-1">{{$view->email}}</h6>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">SSN Number</h5>
                                    <h6 class="text-dark mb-1">{{$view->ssn_number}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Date Of Birth</h5>
                                    <h6 class="text-dark mb-1">{{$view->date_of_birth}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Condidate Rate</h5>
                                    <h6 class="text-dark mb-1">{{$view->condidate_rate}}</h6>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Employee name</h5>
                                    <h6 class="text-dark mb-1">{{$view->employee_name}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">End Client name</h5>
                                    <h6 class="text-dark mb-1">{{$view->end_client_name}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">End Client Address</h5>
                                    <h6 class="text-dark mb-1">{{$view->end_client_address}}</h6>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Position Title</h5>
                                    <h6 class="text-dark mb-1">{{$view->position_title}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Start date</h5>
                                    <h6 class="text-dark mb-1">{{$view->start_date}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">End Client Rate</h5>
                                    <h6 class="text-dark mb-1">{{$view->end_client_rate}}</h6>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Through Company</h5>
                                    <h6 class="text-dark mb-1">{{$view->through_company}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Company</h5>
                                    <h6 class="text-dark mb-1">{{$view->company_name}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Through Agent</h5>
                                    <h6 class="text-dark mb-1">{{$view->through_agent}}</h6>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Agent</h5>
                                    <h6 class="text-dark mb-1">{{$view->agent_name}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Commission</h5>
                                    <h6 class="text-dark mb-1">{{$view->placement_commission}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Amount</h5>
                                    <h6 class="text-dark mb-1">{{$view->commission_amount}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="mb-3">Internal Recruiter</h5>
                                    <h6 class="text-dark mb-1">{{$view->internal_recruiter}}</h6>
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