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
                        <h3 class="card-title">Document/Create</h3>
                    </div>
                    <!-- show success and unsuccess message -->
                    @if (session('success'))
                    <p class="alert alert-success text-center">{{ session('success') }}</p>
                    @endif
                    @if (session('unsuccess'))
                    <p class="alert alert-danger text-center">{{ session('unsuccess') }}</p>
                    @endif
                    <!-- End show success and unsuccess message -->

                    <form method="post" action="{{ route('document.save') }}" id="document_form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body pb-2">
                            <div class="row row-sm">
                                <div class="col-lg">
                                <label class="form-label">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control mb-4 @error('name') is-invalid @enderror" placeholder="Enter Name">
                                </div>
                                <div class="col-lg mg-t-10">
                                <label class="form-label">Type</label>
                                <select name="type" class="form-control mb-4 @error('type') is-invalid @enderror" data-bs-placeholder="Select Type">                                
                                    <option value="">Select type</option>
                                    <option value="c2c">C2C</option>
                                    <option value="w2">W2</option>
                                    <option value="1099">1099</option>                                1
                                </select>   
                                </div>                                
                            </div>
                            <div class="row row-sm">                             
                                <div class="mb-0 mt-4 row justify-content-end">
                                    <div class="col-md-7">
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

@endsection


