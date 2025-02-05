@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard Pengajuan Reset Password Email Dinas atau Passphrase TTE</h1>
</div>
{{-- <div class="input-group mb-3 col-lg-30">
  <input type="text" class="form-control" placeholder="Cari" name ="search">
  <button class="btn btn-primary" type="submit" style="margin-left: 5px;">Cari</button>
</div> --}}
<div class="table-responsive small col-lg-15">
  @if(session()->has('success'))
  </div>
    <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
      <span>{{ session('success') }}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
    {{-- <a href="/dashboard/bukutamu/create" class="btn btn-primary mb-3">Agendakan Kunjungan</a> --}}
    <table class="table table-striped table-sm">
      <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pemohon</th>
            <th scope="col">No HP Pemohon</th>
            <th scope="col">Nama User</th>
            <th scope="col">NIK User</th>
            <th scope="col">NIP User</th>
            <th scope="col">Email User</th>
            <th scope="col">Alasan</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($passphrase as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->nama }}</td>
          <td>{{ $p->no_telp }}</td>
          <td>{{ $p->nama_user }}</td>
          <td>{{ $p->nik_user }}</td>
          <td>{{ $p->nip_user}}</td>
          <td>{{ $p->email_domain }}</td>
          <td>{{ $p->alasan }}</td>
          <td>{{ $p->status }}</td>
          <td>
            <form action="/dashboard/passphrase/admin/{{ $p->id }}/selesai" method="POST" class="d-inline">
            @csrf
            @method('put')
            <button class="badge bg-success border-0">
                <i class="bi bi-check-lg fs-6"></i></button>
            </form>
            {{-- <form action="/dashboard/bukutamu/admin/{{ $b->id }}/tolak" method="POST" class="d-inline">
              @csrf
              @method('put')
                <button class="badge bg-danger border-0 mt-1">
                    <i class="bi bi-x-lg fs-6"></i></button>
            </form> --}}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-between align-items-center">
    <form action="/dashboard/passphrase/admin/selesaiSemua" method="POST" class="d-inline">
      @csrf
      @method('put')
      <button class="btn btn-success rounded">Selesaikan Semua</button>
    </form>
    
    <div class="d-inline">{{ $passphrase->links() }}</div>
</div>
@endsection