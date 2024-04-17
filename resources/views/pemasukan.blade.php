@extends('layouts.template')
@section('content')
<div class="row">
    <div class="col-md-6">
      <a class="btn btn-sm btn-primary mt-1" style="border-radius: 20px; background-color: #424874; margin-bottom: 10px;" data-toggle="modal" data-target="#tambahModal">Tambah</a>
    </div>
    <div class="col-md-6">
      {{-- UNTUK SEARCH --}}
    </div>
</div>
<div class="card">
  {{-- <div class="card-header">
      <h3 class="card-title">
        {{ $page->title }}
      </h3>
      <div class="card-tools">
          <a href="{{url('user/create')}}" class="btn btn-sm btn-primary mt-1">Tambah</a>
      </div>
  </div> --}}
  <div class="card-body">
      @if (session('success'))
          <div class="alert alert-success">{{session('success')}}</div>
      @endif
      @if (session('error'))
          <div class="alert alert-danger">{{session('error')}}</div>
      @endif
      <table class="table table-bordered table-hover table-sm" id="table_user">
          <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nominal</th>
                <th scope="col">Jenis Pemasukan</th>
                <th scope="col">Nama Penduduk</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Aksi</th>
              </tr>
          </thead>
          {{-- hanya CONTOH DATA TABEL --}}
          <tbody>
            <tr>
                <td>1</td>
                <td>112</td>
                <td>Kas</td>
                <td>Susanto</td>
                <td>2024-04-15</td>
                <td>
                  <a href="#" class="btn btn-success btn-sm btn-edit" data-jenis="kas"><i class="fas fa-pen"></i></a>
                  <a href="#" class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-target="#hapusModal"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>113</td>
                <td>Paguyuban</td>
                <td>Sriyuni</td>
                <td>2024-04-15</td>
                <td>
                  <a href="#" class="btn btn-success btn-sm btn-edit" data-jenis="paguyuban"><i class="fas fa-pen"></i></a>
                  <a href="#" class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-target="#hapusModal"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>114</td>
                <td>Kas</td>
                <td>Tono</td>
                <td>2024-04-15</td>
                <td>
                  <a href="#" class="btn btn-success btn-sm btn-edit" data-jenis="kas"><i class="fas fa-pen"></i></a>
                  <a href="#" class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-target="#hapusModal"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        </tbody>
      </table>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 25px;">
      <div class="modal-header d-flex justify-content-around">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Pemasukan RT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center mb-3">
          <p>Pilih salah satu</p>
        </div>
        {{-- <div class="btn-group" role="group" aria-label="Jenis Pemasukan"> --}}
          <div class="d-flex justify-content-around">
            <button type="button" class="btn btn-primary" style="width: 40%; border-radius: 20px; background-color: #424874; margin-bottom: 10px;" id="kasButton">KAS</button> <button type="button" class="btn btn-primary" style="width: 40%; border-radius: 20px; background-color: #424874; margin-bottom: 10px;" id="paguyubanButton">PAGUYUBAN</button>
          </div>
        {{-- </div> --}}
      </div>
    </div>
  </div>
</div>
<!-- Modal tambahan untuk KAS -->
<div class="modal fade" id="kasModal" tabindex="-1" role="dialog" aria-labelledby="kasModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kasModalLabel">Tambah Data KAS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi dengan formulir untuk memilih warga dan nominal -->
        <form id="kasForm">
          <div class="form-group">
            <label for="warga_kas">Pilih Warga:</label>
            <select class="form-control" id="warga_kas" name="warga_kas">
              <option value="">Pilih warga</option>
              <!-- Isi dengan opsi warga -->
            </select>
          </div>
          <div class="form-group">
            <label for="nominal_kas">Nominal:</label>
            <input type="text" class="form-control" id="nominal_kas" name="nominal_kas">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary" style="border-radius: 20px; background-color: #424874; width:200px;">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal tambahan untuk PAGUYUBAN -->
<div class="modal fade" id="paguyubanModal" tabindex="-1" role="dialog" aria-labelledby="paguyubanModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paguyubanModalLabel">Tambah Data PAGUYUBAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi dengan formulir untuk memilih warga dan nominal -->
        <form id="paguyubanForm">
          <div class="form-group">
            <label for="warga_paguyuban">Pilih Warga:</label>
            <select class="form-control" id="warga_paguyuban" name="warga_paguyuban">
              <option value="">Pilih warga</option>
              <!-- Isi dengan opsi warga -->
            </select>
          </div>
          <div class="form-group">
            <label for="nominal_paguyuban">Nominal:</label>
            <input type="text" class="form-control" id="nominal_paguyuban" name="nominal_paguyuban">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary" style="border-radius: 20px; background-color: #424874; width:200px;">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal tambahan untuk Edit KAS -->
<div class="modal fade" id="editKasModal" tabindex="-1" role="dialog" aria-labelledby="editKasModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKasModalLabel">Ubah Data KAS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulir untuk mengedit data KAS -->
        <form id="editKasForm">
          <div class="form-group">
            <label for="edit_warga_kas">Pilih Warga:</label>
            <select class="form-control" id="edit_warga_kas" name="edit_warga_kas">
              <option value="">Pilih warga</option>
              <!-- Isi dengan opsi warga untuk KAS -->
            </select>
          </div>
          <div class="form-group">
            <label for="edit_nominal_kas">Nominal:</label>
            <input type="text" class="form-control" id="edit_nominal_kas" name="edit_nominal_kas">
          </div>
          <div class="text-cemter">
            <button type="submit" class="btn btn-primary" style="border-radius: 20px; background-color: #424874; width:200px;">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal tambahan untuk Edit PAGUYUBAN -->
<div class="modal fade" id="editPaguyubanModal" tabindex="-1" role="dialog" aria-labelledby="editPaguyubanModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPaguyubanModalLabel">Ubah Data PAGUYUBAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulir untuk mengedit data PAGUYUBAN -->
        <form id="editPaguyubanForm">
          <div class="form-group">
            <label for="edit_warga_paguyuban">Pilih Warga:</label>
            <select class="form-control" id="edit_warga_paguyuban" name="edit_warga_paguyuban">
              <option value="">Pilih warga</option>
              <!-- Isi dengan opsi warga untuk PAGUYUBAN -->
            </select>
          </div>
          <div class="form-group">
            <label for="edit_nominal_paguyuban">Nominal:</label>
            <input type="text" class="form-control" id="edit_nominal_paguyuban" name="edit_nominal_paguyuban">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary" style="border-radius: 20px; background-color: #424874; width:200px;">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal untuk konfirmasi hapus data -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin menghapus data ini?
      </div>
      <div class="modal-footer justifiy-content">
        <form id="hapusForm" method="" action="">
          @csrf
          @method('DELETE')
          <div class="text-center">
            <button type="submit" class="btn btn-primary" style="border-radius: 20px; background-color: #424874; width:200px;">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('css')
@endpush

@push('js')
<script>
  // Fungsi untuk menampilkan modal tambahan berdasarkan jenis pemasukan yang dipilih
  document.getElementById('kasButton').addEventListener('click', function() {
    $('#kasModal').modal('show');
  });

  document.getElementById('paguyubanButton').addEventListener('click', function() {
    $('#paguyubanModal').modal('show');
  });

  document.querySelectorAll('.btn-edit').forEach(function(btnEdit) {
  btnEdit.addEventListener('click', function() {
    var jenisPemasukan = btnEdit.dataset.jenis;
    if (jenisPemasukan === 'kas') {
      $('#editKasModal').modal('show');
    } else if (jenisPemasukan === 'paguyuban') {
      $('#editPaguyubanModal').modal('show');
    }
  });
});

// Fungsi untuk menampilkan modal hapus data
document.querySelectorAll('.btn-delete').forEach(function(btnDelete) {
    btnDelete.addEventListener('click', function() {
      var form = btnDelete.closest('tr').querySelector('form#hapusForm');
      $('#hapusModal').find('form#hapusForm').attr('action', form.action);
      $('#hapusModal').modal('show');
    });
  });
</script>
@endpush