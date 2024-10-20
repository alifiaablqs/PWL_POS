@extends('layouts.template')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar level</h3>
            <div class="card-tools">
            <!-- Import Level Button -->
            <button onclick="modalAction(`{{ url('/level/import') }}`)" class="btn btn-info">Import Level</button>
            <!-- Export Excel Level Button -->
            <a href="{{ url('/level/export_excel') }}" class="btn btn-primary"><i class="fa fa-file-excel"></i> Export Level</a>
            <!-- Export PDF Level Button -->
            <a href="{{ url('/level/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file-pdf"></i> Export Level</a>
            <!-- Tambah Ajax Button -->
            <button onclick="modalAction(`{{ url('/level/create_ajax') }}`)" class="btn btn-success">Tambah Ajax</button>

            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-sm table-striped table-hover" id="table-level">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Level</th>
                        <th>Nama Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false"
        data-width="75%"></div>
@endsection
@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }
        var tableLevel;
        $(document).ready(function() {
            tableLevel = $('#table-level').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ url('level/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.filter_kategori = $('.filter_kategori').val();
                    }
                },
                columns: [
                {
                    // nomor urut dari laravel datatable addIndexColumn()
                    data: "DT_RowIndex", 
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "level_kode", 
                    className: "",
                    orderable: true, 
                    searchable: true
                },
                {
                    data: "level_nama", 
                    className: "",
                    orderable: true, 
                    searchable: true
                },
                {
                    data: "aksi", 
                    className: "",
                    orderable: false, 
                    searchable: false
                }
            ]
            });
            $('#table-level_filter input').unbind().bind().on('keyup', function(e) {
                if (e.keyCode == 13) { // enter key
                    tableLevel.search(this.value).draw();
                }
            });
            $('.filter_kategori').change(function() {
                tableLevel.draw();
            });
        });
    </script>
@endpush