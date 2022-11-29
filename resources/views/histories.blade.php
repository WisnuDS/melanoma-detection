@extends('layouts.app')

@section('content')
<div class="container">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
      <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
          <h3 class="card-label">Daftar Hasil Diagnosis
          <span class="d-block text-muted pt-2 font-size-sm">Berikut merupakan tabel hasil dari diagnosis</span></h3>
        </div>
      </div>
      <div class="card-body">
        <!--begin::Search Form-->
        <div class="mb-7">
          <div class="row">
            <div class="col-lg-12 col-xl-12">
              <div class="row align-items-center">
                <div class="col-md-2 my-2 my-md-0">
                  <div class="d-flex align-items-center">
                    {{-- <label class="mr-3 mb-0 d-none d-md-block">Show:</label>
                    <select class="form-control" id="kt_datatable_search_type">
                      <option value="">5</option>
                      <option value="1">10</option>
                      <option value="2">50</option>
                      <option value="3">100</option>
                    </select> --}}
                  </div>
                </div>
                <div class="col-md-6 my-2 my-md-0"></div>
                <div class="col-md-4 my-2 my-md-0">
                  <div class="input-icon">
                    <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                    <span>
                      <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end::Search Form-->
        <!--begin: Datatable-->
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
          <thead>
            <tr>
              <th>ID</th>
              <th>No</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Umur</th>
              <th>Posisi Lesi Kulit</th>
              <th>Link Gambar</th>
              <th>Hasil Deteksi</th>
              <th>Status Deteksi</th>
              <th>Diagnosis Dokter</th>
              <th>Tanggal Deteksi</th>
              {{-- <th>Status</th>
              <th>Type</th>
              <th>Actions</th> --}}
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
        <!--end: Datatable-->
      </div>
    </div>
    <!--end::Card-->
</div>
@endsection

@push('styles')
<style>
  .dataTables_filter, .dataTables_info { display: none; }
</style>
@endpush

@push('scripts')
  <!--begin::Page Vendors(used by this page)-->
  <script src="{{asset("/plugins/custom/datatables/datatables.bundle.js?v=7.0.5")}}"></script>
  <!--end::Page Vendors-->
  <!--begin::Page Scripts(used by this page)-->
  <script src="{{asset("/js/pages/crud/datatables/basic/scrollable-doctor.js?v=7.0.5")}}"></script>
  <!--end::Page Scripts-->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endpush