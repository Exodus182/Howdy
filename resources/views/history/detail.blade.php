@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}" class="text-decoration-none text-reset">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('history')}}" class="text-decoration-none text-reset">Riwayat Pemesanan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
            </ol>
        </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa-solid fa-circle-check"></i> Check Out</h3>
                    <h5>Pesanan Anda Sudah Berhasil Check Out. Untuk Melakukan Pembayaran, Silahkan Transfer di Rekening <span class="fw-bold">Bank Negara: 32151-859320-456</span> dengan Nominal: <span class="fw-bold">Rp. {{ number_format($order->unique_code + $order->subtotal) }}</span></h5>
                </div>
            </div>
            @if(!empty($order))
            <p class="text-end">Tanggal Pesan: {{ $order->date }}</p>
            <div class="card">
            <div class="card-header">
            <h3 class="mt-2"><i class="fa-solid fa-cart-shopping"></i> Detail Pemesanan</h3>
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
                </tr>
            </thead>
            <tbody>
                <?php $no=1 ?>
                @foreach($order_details as $order_detail)
                <tr>
                    <td class="text-center">{{ $no++ }}.</td>
                    <td><img src="{{ url('uploads') }}/{{ $order_detail->item->image }}" width="100px" alt="Produk"></td>
                    <td class="text-end">{{ $order_detail->item->item_name }}</td>
                    <td class="text-end">{{ $order_detail->total }}</td>
                    <td class="text-end">Rp. {{ number_format($order_detail->item->price) }}</td>
                    <td class="text-end">{{ number_format($order_detail->subtotal) }}</td>
                </tr>
                @endforeach
                <tr class="fw-bold">
                    <td colspan="5" class="text-end">Subtotal Biaya:</td>
                    <td class="text-end">Rp. {{ number_format($order->subtotal) }}</td>
                </tr>
                <tr class="fw-bold">
                    <td colspan="5" class="text-end">Kode Unik:</td>
                    <td class="text-end">Rp. {{ number_format($order->unique_code) }}</td>
                </tr>
                <tr class="fw-bold">
                    <td colspan="5" class="text-end">Total yang Harus Ditransfer:</td>
                    <td class="text-end">Rp. {{ number_format($order->unique_code + $order->subtotal) }}</td>
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
