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
                            <h3 class="card-title">Recruitment/List/Edit</h3>
                            <div class="ms-auto pageheader-btn">
                                <a href="{{ route('recruitment.list') }}" class="btn btn-success btn-icon text-white">
                                    <span>
                                        <i class="fe fe-log-in"></i>
                                    </span> Back
                                </a>
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

                        <form method="post" action="{{ route('recruitment.update',$id->id) }}" enctype="multipart/form-data">
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
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" value="{{ $id->name }}" class="form-control mb-4 @error('name') is-invalid @enderror" placeholder="Enter Name">
                                    </div>
                                    <div class="col-lg">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email" value="{{ $id->email }}" class="form-control mb-4 @error('email') is-invalid @enderror" placeholder="email">
                                    </div>

                                </div>
                                <div class="row row-sm">
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <label class="form-label">Employee Code</label>
                                        <input type="text" name="employee_code" value="{{ $id->employee_code }}" class="form-control mb-4 @error('employee_code') is-invalid @enderror" placeholder="Enter Number">
                                    </div>
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" name="phone_number" value="{{ $id->phone_number }}" class="phone-format form-control mb-4 @error('phone_number') is-invalid @enderror" placeholder="Enter Number">
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Note</label>
                                    <textarea name="note" class="form-control" rows="3">{{ $id->note }}</textarea>
                                </div>
                                <div class="mb-0 mt-4 row justify-content-end">
                                    <div class="col-md-9">
                                        <button type="submit" name="update" value="update" class="btn btn-primary">Save</button>
                                        <button class="btn btn-secondary"><a href="{{route('recruitment.create')}}">Cancel</a></button>
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
        /***phone number format***/
        $(".phone-format").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
            var curchr = this.value.length;
            var curval = $(this).val();
            if (curchr == 3 && curval.indexOf("(") <= -1) {
                $(this).val("+1-" + curval + "" + "-");
            } else if (curchr == 4 && curval.indexOf("(") > -1) {
                $(this).val(curval + ")-");
            } else if (curchr == 5 && curval.indexOf(")") > -1) {
                $(this).val(curval + "-");
            } else if (curchr == 10) {
                $(this).val(curval + "-");
                $(this).attr('maxlength', '15');
            }
        });
    });
</script>
@endsection