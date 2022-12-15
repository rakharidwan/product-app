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
                                    <h5 class="card-title"> Product</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">list</h6>
                                </div>
                                <div class="p-2">
                                    <a href="{{ url('/product/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <table id="catalogsTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td><img src="{{ asset('storage/'.$product->image) }}" width="150" height="150" class="img-thumbnail" alt=""></td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->description}}</td>
                                            <td>{{$product->stock}}</td>
                                            <td>
                                                <form action="{{ url('/product/delete/'.$product->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" style="text-align: center">Tidak ada data</td>
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
