@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Manajemen Data Suplier</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('/suplier/new') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {!! session('success') !!}
                            </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Suplier</th>
                                    <th>Nama Suplier</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($supliers as $suplier)
                                <tr>
                                    <td>{{ $suplier->kode }}</td>
                                    <td>{{ $suplier->name }}</td>
                                    <td>{{ $suplier->phone }}</td>
                                    <td>{{ str_limit($suplier->address, 50) }}</td>
                                    <td><a href="mailto:{{ $suplier->email }}">{{ $suplier->email }}</a></td>
                                    <td>
                                        <form action="{{ url('/suplier/' . $suplier->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" class="form-control">
                                            <a href="{{ url('/suplier/' . $suplier->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="5">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="float-right">
                            {{ $supliers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection