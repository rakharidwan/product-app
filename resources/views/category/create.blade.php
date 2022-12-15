@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="p-2">
                            <h5 class="card-title"><i class="fa fa-music"></i> Category</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Create</h6>
                        </div>
                    </div>
                    <form action="{{ url('/category/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label required">Name</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name">
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label required">Description</label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"> {{old('description')}} </textarea>
                                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
