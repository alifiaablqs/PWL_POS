@extends('layouts.template') 

@section('content') 
  <div class="card card-outline card-primary"> 
      <div class="card-header"> 
        <h3 class="card-title">{{ $page->title }}</h3> 
        <div class="card-tools"> 
          <a class="btn btn-sm btn-primary mt-1" href="{{ url('level/create') }}">Tambah</a> 
        </div> 
      </div> 
      <div class="card-body"> 
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }} </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }} </div>
        @endif
        <div class="row">
          <div class="col-md-12">
            <div class="form-group row">
              <label class="col-1 control-label col-form-label">Filter: </label>
              <div class="col-3">
                <select class="form-control" id="level_id" name="level_id" required>
                  <option value="">- Semua -</option>
                  @foreach ($level as $item)
                    <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <table class="table table-bordered table-striped table-hover table-sm" id="table_user"> 
          <thead> 
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Level Pengguna</th>
                <th>Aksi</th>
            </tr> 
          </thead> 
      </table> 
    </div> 
  </div> 
@endsection 

@push('css') 
<style>
    .dataTables_filter {
      float: right;
      display: flex; /* Membuat label dan input dalam satu baris */
      align-items: center; /* Meluruskan label dan input secara vertikal */
    }
    
    .dataTables_filter label {
      margin-right: 10px; /* Memberi jarak antara label dan input */
      text-align: left; /* Meluruskan teks "Search:" secara kiri */
    }
    
    .dataTables_filter input {
      margin-left: 0; /* Menghilangkan margin kiri pada input agar sejajar dengan label */
    }
  </style>
@endpush 

@push('js') 
  <script> 
    $(document).ready(function() { 
      var dataUser = $('#table_user').DataTable({ 
          // serverSide: true, jika ingin menggunakan server side processing 
          serverSide: true,      
          ajax: { 
              "url": "{{ url('level/list') }}", 
              "dataType": "json", 
              "type": "POST" ,
              "data": function (d){
                d.level_id = $('#level_id').val();
              }
          }, 
          columns: [ 
            { 
              // nomor urut dari laravel datatable addIndexColumn() 
              data: "DT_RowIndex",             
              className: "text-center", 
              orderable: false, 
              searchable: false     
            },{ 
              data: "level_kode",                
              className: "", 
              // orderable: true, jika ingin kolom ini bisa diurutkan  
              orderable: true,     
              // searchable: true, jika ingin kolom ini bisa dicari 
              searchable: true     
            },{ 
              data: "level_nama",                
              className: "", 
              orderable: true,     
              searchable: true     
            },{ 
              data: "aksi",                
              className: "", 
              orderable: false,     
              searchable: false     
            } 
          ] 
      }); 
      $('#level_id').on('change', function() {
        dataUser.ajax.reload();
      })
    }); 
  </script> 
@endpush