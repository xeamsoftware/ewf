@extends('layouts.master')

@section('content')


<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div class="row col-lg-12 col-md-12">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Counsultant/Create</h3>
                        </div>
                        <!-- show success and unsuccess message -->
                        @if (session('success'))
                        <p class="alert alert-success text-center">{{ session('success') }}</p>
                        @endif
                        @if (session('unsuccess'))
                        <p class="alert alert-danger text-center">{{ session('unsuccess') }}</p>
                        @endif
                        <!-- End show success and unsuccess message -->

                        <form method="post" action="{{ route('consultant.save') }}" id="myform" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body pb-2">
                                <!-- c2c form area -->

                                <div class="row row-sm">
                                    <div class="col-lg-4">
                                        <label class="form-label">Placement Type</label>
                                        <select name="placement_type" id="placement_type" class="form-control custom-control">
                                            <option value="">Select Placement Type</option>
                                            @foreach($placemenyType as $value)
                                            <option value="{{$value->name}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('placement_type'))
                                        <span class="text-danger">{{ $errors->first('placement_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="document-area">
                                    <div class="row row-sm">
                                        <div class="row row-sm document-area1">

                                        </div>
                                    </div>
                                </div>
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <label class="form-label">Candidate Full Name</label>
                                        <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control mb-4 @error('full_name') is-invalid @enderror">
                                        @if ($errors->has('full_name'))
                                        <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <label class="form-label">Current Location</label>
                                        <input type="text" name="location" value="{{ old('location') }}" class="form-control mb-4 @error('location') is-invalid @enderror">
                                        @if ($errors->has('location'))
                                        <span class="text-danger">{{ $errors->first('location') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <label class="form-label">Work Authorization</label>
                                        <textarea name="work_authorization" value="{{ old('work_authorization') }}" class="form-control"></textarea>
                                        @if ($errors->has('work_authorization'))
                                        <span class="text-danger">{{ $errors->first('work_authorization') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <label class="form-label">Visa Expiry</label>
                                        <input type="date" name="visa_expiry" value="{{ old('visa_expiry') }}" class="form-control mb-4 @error('visa_expiry') is-invalid @enderror">
                                        @if ($errors->has('visa_expiry'))
                                        <span class="text-danger">{{ $errors->first('visa_expiry') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <label class="form-label">Contact Number</label>
                                        <input type="text" name="conatct_number" value="{{ old('conatct_number') }}" class="form-control mb-4 @error('conatct_number') is-invalid @enderror">
                                        @if ($errors->has('conatct_number'))
                                        <span class="text-danger">{{ $errors->first('conatct_number') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email" value="{{ old('email') }}" class="form-control mb-4 @error('email') is-invalid @enderror">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <div class="col-lg">
                                        <label class="form-label">SSN Number</label>
                                        <input type="text" name="ssn_number" value="{{ old('ssn_number') }}" class="form-control mb-4 @error('ssn_number') is-invalid @enderror">
                                        @if ($errors->has('ssn_number'))
                                        <span class="text-danger">{{ $errors->first('ssn_number') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <label class="form-label">Date Of Birth</label>
                                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control mb-4 @error('date_of_birth') is-invalid @enderror">
                                        @if ($errors->has('date_of_birth'))
                                        <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <label class="form-label">Candidate Rate</label>
                                        <input type="text" name="condidate_rate" value="{{ old('condidate_rate') }}" class="form-control mb-4 @error('condidate_rate') is-invalid @enderror">
                                        @if ($errors->has('condidate_rate'))
                                        <span class="text-danger">{{ $errors->first('condidate_rate') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <div class="col-lg-4">
                                        <label class="form-label">Employer Name</label>
                                        <input type="text" name="employer_name" value="{{ old('employer_name') }}" class="form-control mb-4 @error('employer_name') is-invalid @enderror">
                                        @if ($errors->has('employer_name'))
                                        <span class="text-danger">{{ $errors->first('employer_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <div class="col-lg">
                                        <label class="form-label">End Client Name</label>
                                        <input type="text" name="end_client_name" value="{{ old('end_client_name') }}" class="form-control mb-4 @error('end_client_name') is-invalid @enderror">
                                        @if ($errors->has('end_client_name'))
                                        <span class="text-danger">{{ $errors->first('end_client_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <label class="form-label">End Client Address</label>
                                        <input type="text" name="end_client_address" value="{{ old('end_client_address') }}" class="form-control mb-4 @error('end_client_address') is-invalid @enderror">
                                        @if ($errors->has('end_client_address'))
                                        <span class="text-danger">{{ $errors->first('end_client_address') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <label class="form-label">Position Title</label>
                                        <input type="text" name="position_title" value="{{ old('position_title') }}" class="form-control mb-4 @error('position_title') is-invalid @enderror">
                                        @if ($errors->has('position_title'))
                                        <span class="text-danger">{{ $errors->first('position_title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <div class="col-lg-4">
                                        <label class="form-label">Start Date</label>
                                        <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control mb-4 @error('start_date') is-invalid @enderror">
                                        @if ($errors->has('start_date'))
                                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">End Client Rate</label>
                                        <input type="text" name="end_client_rate" value="{{ old('end_client_rate') }}" class="form-control mb-4 @error('end_client_rate') is-invalid @enderror">
                                        @if ($errors->has('end_client_rate'))
                                        <span class="text-danger">{{ $errors->first('end_client_rate') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <h3>Placement Details</h3>

                                <div class=" row mb-4">
                                    <div class="col-lg-4">
                                        <label class="form-label">Through Agent</label>
                                        <select name="through_agent" id="through_agent" class="form-control custom-control">
                                            <option value="">Yes/No</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                        @if ($errors->has('through_agent'))
                                        <span class="text-danger">{{ $errors->first('through_agent') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 through-agent">
                                        <label class="form-label">Agent</label>
                                        <select name="agent" id="agent" class="form-control custom-control">
                                            <option value="">Select Agent</option>
                                            @foreach($agent as $value)
                                            @if($value->account_type == 'agent')
                                            <option value="{{$value->full_name}}">{{$value->full_name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('agent'))
                                        <span class="text-danger">{{ $errors->first('agent') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <div class="col-lg-4">
                                        <label class="form-label">Through Company</label>
                                        <select name="through_company" id="through_company" class="form-control custom-control">
                                            <option value="">Yes/No</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                        @if ($errors->has('through_company'))
                                        <span class="text-danger">{{ $errors->first('through_company') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 through-company">
                                        <label class="form-label">Company</label>
                                        <select name="company" id="company" class="form-control custom-control">
                                            <option value="">Select Company</option>
                                            @foreach($company as $value)
                                            <option value="{{$value->company_name}}">{{$value->company_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('company'))
                                        <span class="text-danger">{{ $errors->first('company') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <div class="col-lg-4">
                                        <label class="form-label">Placement Commission</label>
                                        <select name="commission" id="commission" class="form-control custom-control">
                                            <option value="">Yes/No</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                        @if ($errors->has('commission'))
                                        <span class="text-danger">{{ $errors->first('commission') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 through-amount">
                                        <label class="form-label">Amount</label>
                                        <input type="text" name="amount" value="{{ old('amount') }}" class="form-control mb-4 @error('amount') is-invalid @enderror">
                                        @if ($errors->has('amount'))
                                        <span class="text-danger">{{ $errors->first('amount') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <div class="col-lg-4">
                                        <label class="form-label">Internal Recruiter</label>
                                        <select name="internal_recuriter" id="internal_recuriter" class="form-control custom-control">
                                            <option value="">Select Recruiter</option>
                                            @foreach($agent as $value)
                                            @if($value->account_type == 'recruiter')
                                            <option value="{{$value->full_name}}">{{$value->full_name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('internal_recuriter'))
                                        <span class="text-danger">{{ $errors->first('internal_recuriter') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-0 mt-4 row justify-content-end">
                                    <div class="col-md-9">
                                        <button type="submit" name="insert" value="insert" class="btn btn-primary">Save</button>
                                        <button class="btn btn-secondary"><a href="{{route('incentive.create')}}">Cancel</a></button>
                                    </div>
                                </div>

                            </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js" defer></script>
<script>
    $(function() {
        $("#myform").validate({
            rules: {
                placement_type: {
                    required: true
                },
                full_name: {
                    required: true
                },
                location: {
                    required: true
                },
                work_authorization: {
                    required: true
                },
                visa_expiry: {
                    required: true
                },
                conatct_number: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                ssn_number: {
                    required: true
                },
                date_of_birth: {
                    required: true
                },
                condidate_rate: {
                    required: true
                },
                employer_name: {
                    required: true
                },
                end_client_name: {
                    required: true
                },
                end_client_address: {
                    required: true
                },
                position_title: {
                    required: true
                },
                start_date: {
                    required: true
                },
                end_client_rate: {
                    required: true
                },
                through_agent: {
                    required: true
                },
                agent: {
                    required: true
                },
                through_company: {
                    required: true
                },
                company: {
                    required: true
                },
                commission: {
                    required: true
                },
                void_check_1099: {
                    required: true
                },
                amount: {
                    required: true
                },
                internal_recuriter: {
                    required: true
                }

            },
            messages: {
                company_name: {
                    required: "The Name field is required."
                }
            }
        });
    });

    // placement type check

    $(document).ready(function() {
        $(".document-area").hide();
        $('#placement_type').on('change', function() {
            let status = $(this).val();
            // alert(status);
            $.ajax({
                type: "GET",
                url: '{{ url("consultant")}}/consultant-document',
                data: {
                    'status': status
                },
                success: function(data) {
                    // console.log(data);
                    $('.document-area').show();
                    $('.document-area1').show();
                    $(".document-area1").html(data);
                }
            });

        });
    });
    // through company
    $(document).ready(function() {
        $(".through-company").hide();
        $('#through_company').on('change', function() {
            if (this.value == 'yes') {
                $(".through-company").show();
            }
            if (this.value == 'no') {
                $(".through-company").hide();
            }
        });
    });
    // through agent
    $(document).ready(function() {
        $(".through-agent").hide();
        $('#through_agent').on('change', function() {
            if (this.value == 'yes') {
                $(".through-agent").show();
            }
            if (this.value == 'no') {
                $(".through-agent").hide();
            }
        });
    });

    // through commission
    $(document).ready(function() {
        $(".through-amount").hide();
        $('#commission').on('change', function() {
            if (this.value == 'yes') {
                $(".through-amount").show();
            }
            if (this.value == 'no') {
                $(".through-amount").hide();
            }
        });
    });
</script>
@endsection