@extends('layouts.master') 

@section('content')


<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
        <div class="row col-md-12">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Document/Edit</h3>
                        <div class="ms-auto pageheader-btn">
                            <a href="{{ route('document.list') }}" class="btn btn-success btn-icon text-white">
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

                    <form method="post" action="{{ route('document.update',$id->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body pb-2">
                            <div class="row row-sm">
                                <div class="col-lg">
                                <label class="form-label">Name</label>
                                    <input type="text" name="name" value="{{$id->name}}" class="form-control mb-4 @error('name') is-invalid @enderror" placeholder="Enter Name">
                                </div>
                                <div class="col-lg mg-t-10">
                                <label class="form-label">Type</label>
                                <select name="type" class="form-control form-select select2" data-bs-placeholder="Select Country">                                
                                    <option value="{{$id->type}}">{{$id->type}}</option>
                                    <option value="c2c">C2C</option>
                                    <option value="w2">W2</option>
                                    <option value="1099">1099</option>                                1
                                </select>   
                                </div>                                
                            </div>
                            <div class="row row-sm">                             
                                <div class="mb-0 mt-4 row justify-content-end">
                                    <div class="col-md-7">
                                        <button type="submit" class="btn btn-primary">Save</button>
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


