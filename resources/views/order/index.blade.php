@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}" class="text-decoration-none text-reset">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$item->item_name}}</li>
            </ol>
        </nav>
        </div>
        <div class="col-md-12 my-2">
            <div class="card rounded">
                <div class="card-header">
                    <h3 class="ms-2 my-2 text-center fw-bold">{{$item->item_name}}</h3>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ url('uploads') }}/{{$item->image}}" class="rounded mx-auto d-block" width="100%" height="450px" alt="Produk">
                    </div>
                    <div class="col-md-7">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>Harga</td>
                                <td>:</td>
                                <td>Rp. {{ number_format($item->price) }}</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>:</td>
                                <td>{{ $item->stock }}</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td>{{ $item->description }}</td>
                            </tr>
                                <tr>
                                    <td>Jumlah Pesan</td>
                                    <td>:</td>
                                    <td>
                                        <form action="{{ url('order') }}/{{ $item->id }}" method="POST">
                                        @csrf
                                            <input type="text" name="order_number" class="form-control" required>
                                            <hr>
                                            <button type="submit" class="btn btn-success mt-3"><i class="fa-solid fa-plus"></i> Produk ke Keranjang</button>
                                        </form>
                                    </td>
                                </tr>
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
