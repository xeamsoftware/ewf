@extends('layouts.master')

@section('content')


<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Company/Create</h3>
                        </div>
                        <!-- show success and unsuccess message -->
                        @if (session('success'))
                        <p class="alert alert-success text-center">{{ session('success') }}</p>
                        @endif
                        @if (session('unsuccess'))
                        <p class="alert alert-danger text-center">{{ session('unsuccess') }}</p>
                        @endif
                        <!-- End show success and unsuccess message -->

                        <form method="post" action="{{ route('company.save') }}" id="myform" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body pb-2">
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <label class="form-label">Company Name</label>
                                        <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control mb-4 @error('company_name') is-invalid @enderror" placeholder="Enter Company Name">
                                        @if ($errors->has('company_name'))
                                        <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <label class="form-label">Company Address</label>
                                        <input type="text" name="company_address" value="{{ old('company_address') }}" class="form-control mb-4 @error('company_address') is-invalid @enderror" placeholder="Enter Company Number">
                                        @if ($errors->has('company_address'))
                                        <span class="text-danger">{{ $errors->first('company_address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <label class="form-label">State of incorporaton</label>
                                        <input type="text" name="incorporation" value="{{ old('incorporation') }}" class="form-control mb-4 @error('incorporation') is-invalid @enderror" placeholder="incorporation">
                                        @if ($errors->has('incorporation'))
                                        <span class="text-danger">{{ $errors->first('incorporation') }}</span>
                                        @endif
                                    </div>


                                    <div class="row row-sm">
                                        <div class="col-lg">
                                            <label class="form-label">Federal Tax Id</label>
                                            <input type="text" name="federal_tax" value="{{ old('federal_tax') }}" class="form-control mb-4 @error('federal_tax') is-invalid @enderror" placeholder="Enter Federal Tax">
                                            @if ($errors->has('federal_tax'))
                                            <span class="text-danger">{{ $errors->first('federal_tax') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0">
                                            <label class="form-label">Signing Authority Name</label>
                                            <input type="text" name="authority_name" value="{{ old('authority_name') }}" class="form-control mb-4 @error('authority_name') is-invalid @enderror" placeholder="Enter Authority Name">
                                            @if ($errors->has('authority_name'))
                                            <span class="text-danger">{{ $errors->first('authority_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0">
                                            <label class="form-label">Designation</label>
                                            <input type="text" name="disignation" value="{{ old('disignation') }}" class="form-control mb-4 @error('disignation') is-invalid @enderror" placeholder="Enter Designation">
                                            @if ($errors->has('disignation'))
                                            <span class="text-danger">{{ $errors->first('disignation') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row row-sm">
                                        <div class="col-lg">
                                            <label class="form-label">Phone No</label>
                                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control mb-4 @error('phone') is-invalid @enderror" placeholder="Enter Federal Tax">
                                            @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0">
                                            <label class="form-label">Fax No</label>
                                            <input type="text" name="fax_no" value="{{ old('fax_no') }}" class="form-control mb-4 @error('fax_no') is-invalid @enderror" placeholder="Enter Fax Name">
                                            @if ($errors->has('fax_no'))
                                            <span class="text-danger">{{ $errors->first('fax_no') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0">
                                            <label class="form-label">Company Email</label>
                                            <input type="text" name="company_email" value="{{ old('company_email') }}" class="form-control mb-4 @error('company_email') is-invalid @enderror" placeholder="Enter Company Email">
                                            @if ($errors->has('company_email'))
                                            <span class="text-danger">{{ $errors->first('company_email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row row-sm">
                                        <div class="col-lg">
                                            <label class="form-label">Accounts Name</label>
                                            <input type="text" name="account_name" value="{{ old('account_name') }}" class="form-control mb-4 @error('account_name') is-invalid @enderror" placeholder="Enter Account Name">
                                            @if ($errors->has('account_name'))
                                            <span class="text-danger">{{ $errors->first('account_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0">
                                            <label class="form-label">Accounts Email</label>
                                            <input type="text" name="account_email" value="{{ old('account_email') }}" class="form-control mb-4 @error('account_email') is-invalid @enderror" placeholder="Enter Account Email">
                                            @if ($errors->has('account_email'))
                                            <span class="text-danger">{{ $errors->first('account_email') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0">
                                            <label class="form-label">Accounts Phone No</label>
                                            <input type="text" name="account_phone" value="{{ old('account_phone') }}" class="form-control mb-4 @error('account_phone') is-invalid @enderror" placeholder="Enter Account Phone No">
                                            @if ($errors->has('account_phone'))
                                            <span class="text-danger">{{ $errors->first('account_phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row row-sm">
                                        <div class="col-lg">
                                            <label class="form-label">Sales Name</label>
                                            <input type="text" name="sales_name" value="{{ old('sales_name') }}" class="form-control mb-4 @error('sales_name') is-invalid @enderror" placeholder="Enter Sales Name">
                                            @if ($errors->has('sales_name'))
                                            <span class="text-danger">{{ $errors->first('sales_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0">
                                            <label class="form-label">Sales Email</label>
                                            <input type="text" name="sales_email" value="{{ old('sales_email') }}" class="form-control mb-4 @error('sales_email') is-invalid @enderror" placeholder="Enter Sales Email">
                                            @if ($errors->has('sales_email'))
                                            <span class="text-danger">{{ $errors->first('sales_email') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0">
                                            <label class="form-label">Sales Phone No</label>
                                            <input type="text" name="sales_phone" value="{{ old('sales_phone') }}" class="form-control mb-4 @error('sales_phone') is-invalid @enderror" placeholder="Enter Sales Phone No">
                                            @if ($errors->has('sales_phone'))
                                            <span class="text-danger">{{ $errors->first('sales_phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Note</label>
                                        <textarea name="note" value="{{ old('note') }}" class="form-control" rows="3"></textarea>
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
                company_name: {
                    required: true
                },
                company_address: {
                    required: true
                },
                incorporation: {
                    required: true
                },
                federal_tax: {
                    required: true
                },
                authority_name: {
                    required: true
                },
                disignation: {
                    required: true
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                fax_no: {
                    required: true
                },
                company_email: {
                    required: true,
                    email: true,
                },
                account_name: {
                    required: true
                },
                account_email: {
                    required: true,
                    email: true,
                },
                account_phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                sales_name: {
                    required: true
                },
                sales_email: {
                    required: true,
                    email: true,
                },
                sales_phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                }
            },
            messages: {
                company_name: {
                    required: "The Name field is required."
                }
            }
        });
    });
</script>
@endsection