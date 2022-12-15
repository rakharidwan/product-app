@extends('layouts.app')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session()->has('status'))
                <div class="alert alert-{{session()->get('status')}}">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="p-2 flex-grow-1">
                                    <h5 class="card-title"> Category</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">list</h6>
                                </div>
                                <div class="p-2">
                                    <a href="{{ url('/category/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <table id="catalogsTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($categorys as $category)
                                        <tr>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->description}}</td>
                                            <td>
                                                <form action="{{ url('/category/delete/'.$category->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{url('/category/edit/'.$category->id)}}" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" style="text-align: center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
