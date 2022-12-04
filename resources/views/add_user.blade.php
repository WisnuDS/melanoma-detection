@extends('layouts.app')

@section('content')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid mb-5">
  <!--begin::Container-->
  <div class="container">
    <!--begin::Profile Personal Information-->
    <div class="d-flex flex-row">
      <!--begin::Content-->
      <div class="flex-row-fluid ml-lg-12">
        <!--begin::Form-->
        <form class="form" method="POST" action="{{ route(auth()->user()->roles[0]->name . '.users.store') }}">
          @csrf
          <!--begin::Card-->
          <div class="card card-custom card-stretch">
            <!--begin::Header-->
            <div class="card-header py-3">
              <div class="card-title align-items-start flex-column mb-1 mt-3">
                <h3 class="card-label font-weight-bolder text-dark">Tambah User</h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">Tambahkan informasi user baru</span>
              </div>
              <div class="card-toolbar mb-1 mt-3">
                <input type="submit" class="btn btn-success mr-2" value="Simpan">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
              </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-right">Nama</label>
                <div class="col-lg-9 col-xl-6">
                  <input class="form-control form-control-lg form-control-solid" type="text" name="name" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-right">Email</label>
                <div class="col-lg-9 col-xl-6">
                  <input class="form-control form-control-lg form-control-solid" type="text" name="email" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-right">Tanggal Lahir</label>
                <div class="col-lg-9 col-xl-6">
                  <input class="form-control form-control-lg form-control-solid" type="date" name="birth_date" />
                  {{-- <span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span> --}}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-right">Jenis Kelamin</label>
                <div class="col-lg-9 col-xl-6">
                  <select class="form-control form-control-lg form-control-solid" name="gender">
                    <option value="" disabled selected>Pilih Salah Satu</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-right">Role</label>
                <div class="col-lg-9 col-xl-6">
                  <select class="form-control form-control-lg form-control-solid" name="role">
                    <option value="" disabled selected>Pilih Salah Satu</option>
                    <option value="admin">Admin</option>
                    <option value="doctor">Dokter</option>
                  </select>
                </div>
              </div>
            </div>
            <!--end::Body-->
          </div>
        </form>
        <!--end::Form-->
      </div>
      <!--end::Content-->
    </div>
    <!--end::Profile Personal Information-->
  </div>
  <!--end::Container-->
</div>
<!--end::Entry-->
@endsection