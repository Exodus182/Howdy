@extends('layouts.app')

@section('title', __('Admin Menu'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Admin Menu</li>
                </ol>
              </nav>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">          
                        <h4><i class="fa fa-pencil"></i> Admin Menu</h4>
                        <div class="card-body">
                            <table class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No.</th>
                                    <th>Menu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php 
                                    $no = 1;    
                                ?>
                                <tr>
                                    <td>
                                        {{ $no++ }}
                                    </td>
                                    <td>Add Items</td>
                                    <td>
                                        <a href="{{ url('add-items') }}">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ $no++ }}
                                    </td>
                                    <td>Update Items</td>
                                    <td>
                                        <a href="{{ url('update-list') }}">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ $no++ }}
                                    </td>
                                    <td>Delete Items</td>
                                    <td>
                                        <a href="{{ url('delete-items') }}">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button>
                                        </a>
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