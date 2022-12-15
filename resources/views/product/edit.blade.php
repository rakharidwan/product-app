@extends('layouts.app')

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<style>
.form-label.required:after{
    content:" *";
    color:red;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="p-2">
                            <h5 class="card-title"><i class="fa fa-music"></i> Product</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Edit</h6>
                        </div>
                    </div>
                    <form action="{{ url('/product/update/'.$product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://via.placeholder.com/240" id="preview_image" class="img-thumbnail" alt="...">
                            </div>
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="product_image" class="form-label required">Image</label>
                                    <input type="file" name="image" value="{{old('image',$product->image)}}" class="form-control @error('image') is-invalid @enderror" id="product_image">
                                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="product_name" class="form-label required">Product Name</label>
                                    <input type="text" name="product_name" value="{{old('product_name',$product->product_name)}}" class="form-control @error('product_name') is-invalid @enderror" id="product_name">
                                    @error('product_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label required">Product Name</label>
                                    <select type="text" name="category" class="form-control @error('category') is-invalid @enderror" id="category">
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categorys as $category)
                                        <option {{ old('category',$product->category_id) == $category->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label required">Description</label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"> {{old('description',$product->description)}} </textarea>
                                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="stock" class="form-label required">Stock</label>
                                    <input type="number" name="stock" value="{{old('stock',$product->stock)}}" class="form-control @error('stock') is-invalid @enderror" id="stock">
                                    @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
product_image.onchange = evt => {
  const [file] = product_image.files
  if (file) {
    preview_image.src = URL.createObjectURL(file)
  }
}
</script>
@endsection
