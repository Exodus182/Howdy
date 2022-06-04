@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Admin Menu</a></li>
                <li class="breadcrumb-item"><a href="{{ url('update-list') }}">Item List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Items</li>
            </ol>
        </nav>
        </div>
        <div class="col-md-12 my-2">
            <div class="card rounded">
                <div class="card-header">
                    <h3 class="ms-2 my-2 text-center fw-bold">Edit Item: {{ $item->item_name }}</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-2">
                            <img src="{{ url('uploads') }}/{{$item->image}}" class="rounded mx-auto d-block" width="100%" height="450px" alt="Produk">
                        </div>
                    </div>
                    <form action="{{ url('update-item') }}/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-1">
                            <label for="name" class="col-md-2 col-form-label text-md-end">Nama Produk: </label>

                            <div class="col-md-6">
                                <input type="text" name="item_name" class="form-control" value="{{ $item->item_name }}">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="name" class="col-md-2 col-form-label text-md-end">Harga: </label>

                            <div class="col-md-6">
                                <input type="text" name="price" class="form-control" value="{{ $item->price }}">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="name" class="col-md-2 col-form-label text-md-end">Stock: </label>

                            <div class="col-md-6">
                                <input type="text" name="stock" class="form-control" value="{{ $item->stock }}">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="name" class="col-md-2 col-form-label text-md-end">Deskripsi Produk: </label>

                            <div class="col-md-6">
                                <textarea name="description" id="" cols="63" rows="5">{{ $item->description }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Attach Product Image</label>
                            <div class="col-md-6">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                            @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
