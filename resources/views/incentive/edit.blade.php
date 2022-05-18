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
                        <h3 class="card-title">Incentive/List/Edit</h3>
                        <div class="ms-auto pageheader-btn">
                            <a href="{{ route('incentive.list') }}" class="btn btn-success btn-icon text-white">
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

                    <form method="post" action="{{ route('incentive.update',$id->id) }}" enctype="multipart/form-data">
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
                                <label class="form-label">Percentage</label>
                                <input type="text" name="percentage" value="{{ $id->percentage }}" class="form-control mb-4 @error('percentage') is-invalid @enderror" placeholder="Percentage">
                                </div>                              
                                
                            </div>
                            <div class="row row-sm">
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label class="form-label">From Amount</label>    
                                    <input type="text" name="from_amount" value="{{ $id->from }}" class="form-control mb-4 @error('from_amount') is-invalid @enderror" placeholder="Enter Number">
                                </div>
                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <label class="form-label">To Amount</label>
                                    <input type="text" name="to_amount" value="{{ $id->to }}" class="form-control mb-4 @error('to_amount') is-invalid @enderror" placeholder="Enter Number">
                                </div>
                                
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Note</label>                                
                                    <textarea name="note" class="form-control" rows="3">{{ $id->incentive_note }}</textarea>                                
                                </div>
                                <div class="mb-0 mt-4 row justify-content-end">
                                    <div class="col-md-9">
                                        <button type="submit" name="update" value="update" class="btn btn-primary">Save</button>
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

@endsection


