@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}" class="text-decoration-none text-reset">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}" class="text-decoration-none text-reset">Admin Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Delete Item</li>
            </ol>
        </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
            <h3 class="mt-2"><i class="fa-solid fa-cart-trash"></i>Admin Menu > Delete Item</h3>
            </div>
            <div class="card-body">
            <table class="table table-striped">
            <thead class="text-center">
                <tr>
                    <th>No Id.</th>
                    <th>Nama Pakaian</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1 ?>
                @foreach($items as $item)
                <tr>
                    <td class="text-center">{{ $no++ }}.</td>
                    <td>{{ $item->item_name }}</td>
                    <td>Rp. {{ number_format($item->price) }}</td>
                    <td>{{ number_format($item->stock) }}</td>
                    <td>{{ $item->description }}</td>
                    <td class="text-center">
                        <form action="{{ url('delete-items') }}/{{ $item->id }}" method="POST">
                        @csrf
                        @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data?');"><i class="fa-solid fa-trash"></i></button>
                        </form>
                        @if (session('success'))
                            <p>{{ session('success') }}</p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </div>
            </div>
        </div>

    </div>
</div>
@endsection