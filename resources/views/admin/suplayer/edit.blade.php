@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rubah Data Supplier</h1>
</div>
<hr>
<form action="../{{$supplier->kd_supp}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset>
        <div class="form-group row">
            <div class="col-md-5">
                <label for="addkdsupp">Kode Supplier</label>
                <input id="addkdsupp" type="text" name="addkdsupp" class="form-control" value="{{$supplier->kd_supp}}" readonly>
            </div>
            <div class="col-md-5">
                <label for="addnmsupp">Nama Supplier</label>
                <input id="addnmsupp" type="text" name="addnmsupp" class="form-control" value="{{$supplier->nm_supp}}">
            </div>
            <div class="col-md-5">
                <label for="addalamat">Alamat</label>
                <input id="addalamat" type="text" name="addalamat" class="form-control" value="{{$supplier->alamat}}">
            </div>
            <div class="col-md-5">
                <label for="addtelepon">Telepon/Hp/Kantor</label>
                <input id="addtelepon" type="text" name="addtelepon" class="form-control" value="{{$supplier->telpon}}">
            </div>

    </fieldset>
    <div class="col-md-10">
        <input type="submit" class="btn btn-success btn-send" value="Update">
        <a href="../../suplayer"><input type="Button" class="btn btn-primary btn-send" value="Kembali"></a>
    </div>
    <hr>
</form>
@endsection