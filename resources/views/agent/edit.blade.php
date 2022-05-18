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
                            <h3 class="card-title">Agent/Create</h3>
                        </div>
                        <!-- show success and unsuccess message -->
                        @if (session('success'))
                        <p class="alert alert-success text-center">{{ session('success') }}</p>
                        @endif
                        @if (session('unsuccess'))
                        <p class="alert alert-danger text-center">{{ session('unsuccess') }}</p>
                        @endif
                        <!-- End show success and unsuccess message -->

                        <form method="post" action="{{ route('agent.update',$id->id) }}" enctype="multipart/form-data">
                            @csrf
                            @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                {{ $error }}<br>
                                @endforeach
                            </div>
                            @endif

                            <div class="card-body pb-2">
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <label class="form-label">Account Type</label>
                                        <select name="account_type" id="account_type" class="form-control custom-control">
                                            <option value="{{ $id->account_type }}">{{ $id->account_type }}</option>
                                            <option value="agent">Agent</option>
                                            <option value="recruiter">Recruiter</option>
                                        </select>
                                        @if ($errors->has('account_type'))
                                        <span class="text-danger">{{ $errors->first('account_type') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <label class="form-label">Employee ID</label>
                                        <input type="text" name="employee_id" value="{{ $id->employee_id }}" class="form-control mb-4 @error('employee_id') is-invalid @enderror" placeholder="Enter Employee ID">
                                        @if ($errors->has('employee_id'))
                                        <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row row-sm">


                                    <div class="row row-sm">
                                        <div class="col-lg">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" name="full_name" value="{{ $id->full_name }}" class="form-control mb-4 @error('full_name') is-invalid @enderror" placeholder="Enter Federal Tax">
                                            @if ($errors->has('full_name'))
                                            <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" value="{{ $id->email }}" class="form-control mb-4 @error('email') is-invalid @enderror" placeholder="Enter Email">
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" name="phone_number" value="{{ $id->phone_number }}" class="form-control mb-4 @error('phone_number') is-invalid @enderror" placeholder="Enter Phone Number">
                                            @if ($errors->has('phone_number'))
                                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row row-sm">
                                        <div class="col-lg">
                                            <label class="form-label">Incentive Type</label>
                                            <label><input type="radio" name="incentive_type" value="flat" {{ $id->flat_amount ? 'checked' : '' }}> Flat</label>
                                            <label><input type="radio" name="incentive_type" value="percentage" {{ $id->percentage ? 'checked' : '' }}> Percentage</label>
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0 flat">
                                            <label class="form-label">Flat Ammount</label>
                                            <input type="text" name="flat_amount" value="{{ $id->flat_amount }}" class="form-control mb-4 @error('flat_amount') is-invalid @enderror" placeholder="Enter flat ammount">
                                            @if ($errors->has('flat_amount'))
                                            <span class="text-danger">{{ $errors->first('flat_amount') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0 percentage">
                                            <label class="form-label">Percentage Number</label>
                                            <input type="text" name="percentage" value="{{ $id->percentage }}" class="form-control mb-4 @error('percentage') is-invalid @enderror" placeholder="Enter percentage">
                                            @if ($errors->has('percentage'))
                                            <span class="text-danger">{{ $errors->first('percentage') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Note</label>
                                        <textarea name="note" class="form-control" rows="3">{{$id->note}}</textarea>
                                    </div>

                                    <div class="mb-0 mt-4 row justify-content-end">
                                        <div class="col-md-9">
                                            <button type="submit" name="update" value="update" class="btn btn-primary">Save</button>
                                            <button class="btn btn-secondary"><a href="{{route('agent.create')}}">Cancel</a></button>
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
    $(document).ready(function() {
        var data = $('input[name="incentive_type"]:checked').val();
        if (data == 'flat') {
            $('.percentage').hide();
            $('.flat').show();
        } else {
            $('.percentage').show();
            $('.flat').hide();
        }
    });

    $(document).ready(function() {
        $('input[type="radio"]').click(function() {
            var inputValue = $(this).attr("value");
            if (inputValue == 'flat') {
                $('.percentage').hide();
                $('.flat').show();
            } else {
                $('.percentage').show();
                $('.flat').hide();
            }
        });
    });
</script>
@endsection