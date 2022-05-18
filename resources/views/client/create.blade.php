@extends('layouts.master')

@section('content')

<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div class="row col-lg-16 col-md-12">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Client/Create</h3>
                        </div>
                        <!-- show success and unsuccess message -->
                        @if (session('success'))
                        <p class="alert alert-success text-center">{{ session('success') }}</p>
                        @endif
                        @if (session('unsuccess'))
                        <p class="alert alert-danger text-center">{{ session('unsuccess') }}</p>
                        @endif
                        <!-- End show success and unsuccess message -->

                        <form method="post" action="{{ route('client.save') }}" id="client_form" enctype="multipart/form-data">
                            @csrf
                            <!-- @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                        {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif -->
                            <div class="card-body pb-2">
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <label class="form-label">Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control mb-4 @error('name') is-invalid @enderror" placeholder="Enter Name">
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg">
                                        <label class="form-label">Email<span class="text-danger">*</span></label>
                                        <input type="text" name="email" value="{{ old('email') }}" class="form-control mb-4 @error('email') is-invalid @enderror" placeholder="email">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="row row-sm">
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <label class="form-label">Phone Number<span class="text-danger">*</span></label>
                                        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" class="form-control mb-4 @error('phone_number') is-invalid @enderror" placeholder="Enter Number">
                                        @if ($errors->has('phone_number'))
                                        <span class="text-danger">{{ $errors->first('phone_number') }}</span>
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
                                        <button class="btn btn-secondary"><a href="{{route('client.create')}}">Cancel</a></button>
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

@endsection