@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Suplier</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/suplier/' . $suplier->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                             <div class="form-group">
                                <label for="">Kode Suplier</label>
                                <input type="text" name="kode" class="form-control {{ $errors->has('kode') ? 'is-invalid':'' }}" value="{{ $suplier->kode }}" placeholder="Kode Suplier">
                                <p class="text-danger">{{ $errors->first('kode') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Suplier</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ $suplier->name }}" placeholder="Masukkan nama lengkap">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="address" cols="5" rows="5" class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}">{{ $suplier->address }}</textarea>
                                <p class="text-danger">{{ $errors->first('address') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid':'' }}" value="{{ $suplier->phone }}">
                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="number" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" value="{{ $suplier->email }}" readonly>
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection