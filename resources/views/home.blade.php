@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="my-3 fw-bold">Produk Kami</h3>
    
    <div class="row justify-content-center owl-carousel owl-theme">
        @foreach($items as $item)
        <div class="col">
            <div class="card rounded h-100">
                <img src="{{ url('uploads') }}/{{ $item->image }}" class="card-img-top" alt="produk" height="300px">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->item_name }}</h5>
                    <table>
                        <tbody>
                            <tr>
                                <td>Harga</td>
                                <td>:</td>
                                <td>&nbsp;Rp. {{number_format($item->price)}}</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>:</td>
                                <td>&nbsp;{{ $item->stock }}</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td>&nbsp;{{ $item->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    @if (Auth::user()->role == 1)
                        <hr>
                        <a href="{{ url('order') }}/{{ $item->id }}" class="btn btn-success text-center" style="text-align:center;display:block;"><i class="fa-solid fa-cart-shopping"></i> Pesan</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
