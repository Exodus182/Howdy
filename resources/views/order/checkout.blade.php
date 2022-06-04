@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}" class="text-decoration-none text-reset">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Check Out</li>
            </ol>
        </nav>
        </div>
        <div class="col-md-12">
            @if(!empty($order))
            <p class="text-end">Tanggal Pesan: {{ $order->date }}</p>
            <div class="card">
            <div class="card-header">
            <h3 class="mt-2"><i class="fa-solid fa-cart-shopping"></i> Check Out</h3>
            </div>
            <div class="card-body">
            <table class="table table-striped">
            <thead class="text-center">
                <tr>
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>Nama Pakaian</th>
                    <th>Jumlah Pakaian</th>
                    <th>Total</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1 ?>
                @foreach($order_details as $order_detail)
                <tr>
                    <td class="text-center">{{ $no++ }}.</td>
                    <td><img src="{{ url('uploads') }}/{{ $order_detail->item->image }}" width="100px" alt="Produk"></td>
                    <td>{{ $order_detail->item->item_name }}</td>
                    <td>{{ $order_detail->total }}</td>
                    <td>Rp. {{ number_format($order_detail->item->price) }}</td>
                    <td>{{ number_format($order_detail->subtotal) }}</td>
                    <td class="text-center">
                        <form action="{{ url('checkout') }}/{{ $order_detail->id }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data?');"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr class="fw-bold">
                    <td colspan="5" class="text-end">Subtotal Biaya:</td>
                    <td>Rp. {{ number_format($order->subtotal) }}</td>
                    <td class="text-center">
                        <a href="{{ url('confirm-checkout') }}" class="btn btn-success" onclick="return confirm('Anda yakin ingin Check Out?');"><i class="fa-solid fa-cart-shopping"></i> Check Out</a>
                    </td>
                </tr>
            </tbody>
            </table>
            @endif
            </div>
            </div>
        </div>

    </div>
</div>
@endsection
