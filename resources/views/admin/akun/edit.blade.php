@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<form action="" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset>
        <legend>Ubah Data Akun</legend>
        <div class="form-group row">
            <div class="col-md-5">
                <label for="addkdbrg">Kode Akun</label>
                <input class="form-control" type="text" name="kd_akun" value="{{$akun->kd_akun}}" readonly disabled>
            </div>
            <div class="col-md-5">
                <label for="addnmbrg">Nama Akun</label>
                <input id="addnmbrg" type="text" name="nm_akun" class="form-control" value="{{$akun->nm_akun}}">
            </div>
    </fieldset>
    <div class="col-md-10">
        <input type="submit" class="btn btn-success btn-send" value="Update">
        <a href="../akun"><input type="Button" class="btn btn-primary btn-send" value="Kembali"></a>
    </div>
    <hr>
</form>
@endsection