@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pengguna</h1>
</div>
<hr>
<div class="card-header py-3" align="right">
    <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i>Tambah</button>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table tablebordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th width="5%">User Id</th>
                        <th width="25%">Nama</th>
                        <th width="20%">Email</th>
                        <th width="15%">Roles/Akses</th>
                        <th width="25%">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($user as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        @foreach ($row->roles as $r)
                        <td>
                            {{$r->id}}
                        </td>
                        @endforeach
                        <td align="center">
                            <a href="/user/hapus/{{ $row->id }}" onclick="return confirm('Yakin Ingin menghapus data?')">
                                <button class="btn btn-danger">Hapus</button>
                            </a>
                            <a href="/user/edit/{{ $row->id }}">
                                <button class="btn btn-success">Edit</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- modal add data-->
<div class="modal inmodal fade" id="modal-add" tabindex="-1" role="dialog" ariahidden="true">
    <div class="modal-dialog modal-xs">
        <form name="frm_add" id="frm_add" class="formhorizontal" action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data User</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group"><label class="col-lg-20 controllabel">Nama User</label>
                        <div class="col-lg10"><input type="text" name="username" required class="form-control"></div>
                        <div class="form-group">
                            <label class="col-lg-20 controllabel">Email User</label>
                            <div class="col-lg10">
                                <input type="email" name="email" required class="form-control">
                            </div>
                            <label class="col-lg-20 controllabel">Password</label>
                            <div class="col-lg10">
                                <input type="password" name="password" required class="form-control">
                            </div>
                            <div class="form-group"><label class="col-lg20 control-label">Roles/Akses</label>
                                <div class="col-lg-10"><select id="roles" name="roles" class="form-control" required>
                                        <option value="">--Pilih Roles--</option>
                                        <option value="ADMIN">Admin</option>
                                        <option value="USER">User</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" datadismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        @endsection
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>