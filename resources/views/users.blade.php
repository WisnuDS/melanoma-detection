@extends('layouts.app')

@section('content')
<div class="container">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
      <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
          <h3 class="card-label">Daftar Pengguna
          <span class="d-block text-muted pt-2 font-size-sm">Berikut merupakan tabel pengguna</span></h3>
        </div>
      </div>
      <div class="card-body">
        <!--begin::Search Form-->
        <div class="mb-7">
          <div class="row">
            <div class="col-lg-12 col-xl-12">
              <div class="row align-items-center">
                <div class="col-md-4 my-2 my-md-0">
                  <div class="input-icon">
                    <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                    <span>
                      <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                  </div>
                </div>
                <div class="col-md-6 my-2 my-md-0"></div>
                <div class="col-md-2 my-2 my-md-0">
                  <div class="d-flex align-items-center">
                    <a href="{{route('admin.users.create')}}" class="btn btn-primary">
                      <i class="fas fa-plus"></i>
                      Tambah User
                    </a>
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
              <th>Role</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Email</th>
              <th>Tanggal Join</th>
              <th>Actions</th>
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
  <script src="{{asset("/js/pages/crud/datatables/basic/scrollable-user-management.js?v=7.0.5")}}"></script>
  
  <!--end::Page Scripts-->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endpush