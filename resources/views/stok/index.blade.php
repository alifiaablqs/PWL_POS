@extends('layouts.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <!-- Import Level Button -->
            <button onclick="modalAction(`{{ url('/stok/import') }}`)" class="btn btn-info">Import Stok</button>
            <!-- Export Excel Level Button -->
            <a href="{{ url('/stok/export_excel') }}" class="btn btn-primary"><i class="fa fa-file-excel"></i> Export Stok</a>
            <!-- Export PDF Level Button -->
            <a href="{{ url('/stok/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file-pdf"></i> Export Stok</a>
            <!-- Tambah Ajax Button -->
            <button onclick="modalAction(`{{ url('/stok/create_ajax') }}`)" class="btn btn-success">Tambah Ajax</button>

        </div>
    </div> 
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered table-striped table-hover table-sm" id="table_stok">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Supplier ID</th>
                    <th>Barang ID</th>
                    <th>Stok Tanggal</th>
                    <th>Stok Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true"></div>
@endsection

@push('css')
@endpush

@push('js')
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }
    var datastok;
    $(document).ready(function() {
        datastok = $('#table_stok').DataTable({
            serverSide: true,
            ajax: {
                "url": "{{ url('stok/list') }}",
                "dataType": "json",
                "type": "POST",
            },
            columns: [
                {
                    data:"DT_RowIndex",
                    className: "",
                    width: "10%",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "supplier_id", 
                    className: "",
                    width: "10%",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "barang_id",  
                    className: "",
                    width: "10%",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "stok_tanggal",  
                    className: "",
                    width: "30%",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "stok_jumlah",
                    className: "",
                    width: "10%",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "aksi",
                    className: "",
                    width: "14%",
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });
</script>
@endpush