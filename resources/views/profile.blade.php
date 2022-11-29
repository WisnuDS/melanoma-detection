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
        <form class="form" method="POST" action="{{ route(auth()->user()->roles[0]->name . '.profile.update') }}">
          @method('PUT')
          @csrf
          <!--begin::Card-->
          <div class="card card-custom card-stretch">
            <!--begin::Header-->
            <div class="card-header py-3">
              <div class="card-title align-items-start flex-column mb-1 mt-3">
                <h3 class="card-label font-weight-bolder text-dark">Informasi Personal</h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">Update informasi personal anda</span>
              </div>
              <div class="card-toolbar mb-1 mt-3">
                <input type="submit" class="btn btn-success mr-2" value="Simpan Perubahan">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
              </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-right">Nama</label>
                <div class="col-lg-9 col-xl-6">
                  <input class="form-control form-control-lg form-control-solid" type="text" value="{{ auth()->user()->name }}" name="name" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-right">Email</label>
                <div class="col-lg-9 col-xl-6">
                  <input class="form-control form-control-lg form-control-solid" type="text" value="{{ auth()->user()->email }}" name="email" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-right">Tanggal Lahir</label>
                <div class="col-lg-9 col-xl-6">
                  <input class="form-control form-control-lg form-control-solid" type="date" value="{{ auth()->user()->birth_date }}" name="birth_date" />
                  {{-- <span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span> --}}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-right">Jenis Kelamin</label>
                <div class="col-lg-9 col-xl-6">
                  <select class="form-control form-control-lg form-control-solid" name="gender">
                    @if(auth()->user()->gender == 'L')
                      <option value="L" selected>Laki-laki</option>
                      <option value="P">Perempuan</option>
                    @else
                      <option value="L">Laki-laki</option>
                      <option value="P" selected>Perempuan</option>
                    @endif
                  </select>
                  {{-- <input class="form-control form-control-lg form-control-solid" type="date" value="{{ auth()->user()->birth_date }}" name="birth_date" /> --}}
                  {{-- <span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span> --}}
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
<div class="d-flex flex-column-fluid">
  <!--begin::Container-->
  <div class="container">
    <form class="form" action="{{ route('user.profile.update.password') }}" method="POST">
      @method('PUT')
      @csrf
      <!--begin::Profile Personal Information-->
      <div class="d-flex flex-row">
        <!--begin::Form-->
          <!--begin::Content-->
          <div class="flex-row-fluid ml-lg-12">
            <!--begin::Card-->
            <div class="card card-custom card-stretch">
              <!--begin::Header-->
              <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                  <h3 class="card-label font-weight-bolder text-dark">Ubah Password</h3>
                  <span class="text-muted font-weight-bold font-size-sm mt-1">Update password anda</span>
                </div>
                <div class="card-toolbar">
                  <input type="submit" class="btn btn-success mr-2" value="Simpan Perubahan">
                  <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
                </div>
              </div>
              <!--end::Header-->
              <!--begin::Body-->
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label text-right">Password Lama</label>
                  <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid" type="password" name="current_password" />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label text-right">Password Baru</label>
                  <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid" type="password" name="password" />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label text-right">Konfirmasi Password Baru</label>
                  <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid" type="password" name="password_confirmation" />
                    {{-- <span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span> --}}
                  </div>
                </div>
              </div>
              <!--end::Body-->
            </div>
          </div>
          <!--end::Content-->
      </div>
      <!--end::Profile Personal Information-->
    </form>

  </div>
  <!--end::Container-->
</div>
<!--end::Entry-->
@endsection