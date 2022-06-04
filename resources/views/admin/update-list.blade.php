@extends('layouts.app')

@section('title', __('Item List'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Admin Menu</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Item List</li>
                </ol>
              </nav>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">          
                        <h4><i class="fa fa-pencil"></i> Admin Menu > Edit Items</h4>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div><table class="table table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>Nama Pakaian</th>
                                <th>Harga</th>
                                <th>Stock</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Aksi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1 ?>
                            @foreach($items as $item)
                            <tr class="text-center">
                                <td>{{ $no++ }}.</td>
                                <td>{{ $item->item_name }}</td>
                                <td>Rp. {{ number_format($item->price) }}</td>
                                <td>{{ number_format($item->stock) }}</td>
                                <td>{{ $item->description }}</td>
                                <td><img src="{{ url('uploads') }}/{{ $item->image }}" alt="" width="100px"></td>
                                <td class="text-center">
                                    <a href="{{ url('update-item') }}/{{ $item->id }}">
                                        <button type="submit" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></button>
                                    </a>
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
        </div>
    </div>
</div>
@endsection