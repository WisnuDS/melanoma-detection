@extends('layouts.user.app')

@section('content')
<div class="container">
  <!--begin::Primary Card-->
  <div id="primary-card" class="row" style="display: none">
    <div class="col-lg-12">
      <!--begin::Stats Widget 20-->
      <div class="card card-custom bg-light-primary card-stretch gutter-b">
        <!--begin::Body-->
        <div class="card-body my-4">
          <a href="#" class="card-title font-weight-bolder text-primary font-size-h6 mb-4 text-hover-state-dark d-block">Persentase Terdiagnosa</a>
          <div id="text-primary-card" class="font-weight-bold text-muted font-size-sm">
          <span class="text-dark-75 font-weight-bolder font-size-h2 mr-2">0%</span><span id="description-primary-card">Gambar sedang diproses</span></div>
          <div class="progress progress-xs mt-7 bg-primary-o-60">
            <div id="progress-primary-card" class="progress-bar bg-primary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <!--end::Body-->
      </div>
      <!--end::Stats Widget 20-->
    </div>
  </div>

  <!--begin::Success Card-->
  <div id="success-card" class="row" style="display: none">
    <div class="col-lg-12">
      <!--begin::Stats Widget 20-->
      <div class="card card-custom bg-light-success card-stretch gutter-b">
        <!--begin::Body-->
        <div class="card-body my-4">
          <a href="#" class="card-title font-weight-bolder text-success font-size-h6 mb-4 text-hover-state-dark d-block">Persentase Terdiagnosa</a>
          <div id="text-success-card" class="font-weight-bold text-muted font-size-sm">
          <span class="text-dark-75 font-weight-bolder font-size-h2 mr-2">0%</span><span id="description-success-card">Gambar sedang diproses</span></div>
          <div class="progress progress-xs mt-7 bg-success-o-60">
            <div id="progress-success-card" class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <!--end::Body-->
      </div>
      <!--end::Stats Widget 20-->
    </div>
  </div>

  <!--begin::Danger Card-->
  <div id="danger-card" class="row" style="display: none">
    <div class="col-lg-12">
      <!--begin::Stats Widget 20-->
      <div class="card card-custom bg-light-danger card-stretch gutter-b">
        <!--begin::Body-->
        <div class="card-body my-4">
          <a href="#" class="card-title font-weight-bolder text-danger font-size-h6 mb-4 text-hover-state-dark d-block">Persentase Terdiagnosa</a>
          <div id="text-danger-card" class="font-weight-bold text-muted font-size-sm">
          <span class="text-dark-75 font-weight-bolder font-size-h2 mr-2">0%</span><span id="description-danger-card">Gambar sedang diproses</span></div>
          <div class="progress progress-xs mt-7 bg-danger-o-60">
            <div id="progress-danger-card" class="progress-bar bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <!--end::Body-->
      </div>
      <!--end::Stats Widget 20-->
    </div>
  </div>

  <!--begin::Warning Card-->
  <div id="warning-card" class="row" style="display: none">
    <div class="col-lg-12">
      <!--begin::Stats Widget 20-->
      <div class="card card-custom bg-light-warning card-stretch gutter-b">
        <!--begin::Body-->
        <div class="card-body my-4">
          <a href="#" class="card-title font-weight-bolder text-warning font-size-h6 mb-4 text-hover-state-dark d-block">Persentase Terdiagnosa</a>
          <div id="text-warning-card" class="font-weight-bold text-muted font-size-sm">
          <span class="text-dark-75 font-weight-bolder font-size-h2 mr-2">0%</span><span id="description-warning-card">Gambar sedang diproses</span></div>
          <div class="progress progress-xs mt-7 bg-warning-o-60">
            <div id="progress-warning-card" class="progress-bar bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <!--end::Body-->
      </div>
      <!--end::Stats Widget 20-->
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-custom gutter-b">
        <div class="card-header">
         <div class="card-title">
          <h3 class="card-label">
           Diagnosa Melanoma
          </h3>
         </div>
        </div>
        <div class="card-body">
         <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="exampleSelect1">Nama</label>
              <input class="form-control mb-10" placeholder="Nama" type="text" id="name" value="{{ auth()->user()->name }}" disabled>
              <label for="exampleSelect1">Jenis Kelamin</label>
              <select class="form-control mb-10" id="gender" disabled>
                <option disabled>Pilih Jenis Kelamin</option>
                <option value="P" {{ auth()->user()->gender === 'P' ? 'selected' : '' }}>Perempuan</option>
                <option value="L" {{ auth()->user()->gender === 'L' ? 'selected' : '' }}>Laki-laki</option>
              </select>
              <label for="exampleSelect1">Umur</label>
              <input class="form-control mb-10" placeholder="Umur" type="number" id="age" value="{{ \Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::parse(auth()->user()->birth_date)) }}" disabled>
              <label for="exampleSelect1">Posisi Lesi Kulit</label>
              <select class="form-control mb-10" id="lession_position">
                <option disabled selected>Pilih Posisi Lesi Kulit</option>
                <option value="face">Wajah / Kepala</option>
                <option value="neck">Leher</option>
                <option value="chest">Dada</option>
                <option value="abdomen">Perut</option>
                <option value="back">Punggung</option>
                <option value="leg">Kaki</option>
                <option value="other">Lainnya</option>
              </select>
              <label for="file">Upload Foto Lesi Kulit</label>
              <input class="form-control mb-10" type="file" id="file" name="file">
              <div class="d-flex justify-content-end">
                <input id="reset" type="button" value="Reset" class="btn btn-danger m-1">
                <input id="submit" type="button" value="Submit" class="btn btn-primary m-1">
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <img id="imgPreview" width="100%" src="https://via.placeholder.com/600x500/f0f0f0/000000?text=Foto+yang+anda+upload+akan+tampil+disini" alt="gambar">
          </div>
         </div>
        </div>
       </div>
    </div>
  </div>
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
<script src="{{asset("/js/pages/crud/datatables/basic/scrollable.js?v=7.0.5")}}"></script>
<!--end::Page Scripts-->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  const PRIMARY_CARD_ID = 'primary-card';
  const PRIMARY_CARD_PROGRESS_ID = 'progress-primary-card';
  const PRIMARY_CARD_TEXT_ID = 'text-primary-card';
  const PRIMARY_CARD_DESCRIPTION_ID = 'description-primary-card';
  const SUCCESS_CARD_ID = 'success-card';
  const SUCCESS_CARD_PROGRESS_ID = 'progress-success-card';
  const SUCCESS_CARD_TEXT_ID = 'text-success-card';
  const SUCCESS_CARD_DESCRIPTION_ID = 'description-success-card';
  const DANGER_CARD_ID = 'danger-card';
  const DANGER_CARD_PROGRESS_ID = 'progress-danger-card';
  const DANGER_CARD_TEXT_ID = 'text-danger-card';
  const DANGER_CARD_DESCRIPTION_ID = 'description-danger-card';
  const WARNING_CARD_ID = 'warning-card';
  const WARNING_CARD_PROGRESS_ID = 'progress-warning-card';
  const WARNING_CARD_TEXT_ID = 'text-warning-card';
  const WARNING_CARD_DESCRIPTION_ID = 'description-warning-card';
  function hide (id) {
    $(`#${id}`).css('display', 'none');
  }

  function show (id) {
    $(`#${id}`).css('display', 'block');
  }

  function setProgressBar (id, value) {
    $(`#${id}`).css('width', `${value}%`)
      .attr('aria-valuenow', value)
      .attr('aria-valuemin', 0)
      .attr('aria-valuemax', 100);
  }

  function setText (id, text) {
    $(`#${id} span`).text(text);
  }

  function setDescription (id, text) {
    $(`#${id} `).text(text);
  }
  
  function reset () {
    setProgressBar(PRIMARY_CARD_PROGRESS_ID, 0);
    setProgressBar(SUCCESS_CARD_PROGRESS_ID, 0);
    setProgressBar(DANGER_CARD_PROGRESS_ID, 0);
    setProgressBar(WARNING_CARD_PROGRESS_ID, 0);
    setText(PRIMARY_CARD_TEXT_ID, '0');
    setText(SUCCESS_CARD_TEXT_ID, '0');
    setText(DANGER_CARD_TEXT_ID, '0');
    setText(WARNING_CARD_TEXT_ID, '0');
    setDescription(PRIMARY_CARD_DESCRIPTION_ID, '0');
    setDescription(SUCCESS_CARD_DESCRIPTION_ID, '0');
    setDescription(DANGER_CARD_DESCRIPTION_ID, '0');
    setDescription(WARNING_CARD_DESCRIPTION_ID, '0');
    hide(PRIMARY_CARD_ID);
    hide(SUCCESS_CARD_ID);
    hide(DANGER_CARD_ID);
    hide(WARNING_CARD_ID);
  }

  function resetForm () {
    $("#lession_position").prop('selectedIndex', 0);
    $("#file").val('');

  }

  function getCurrentProgress (id) {
    return $(`#${id}`).attr('aria-valuenow');
  }

  function loading () {
    reset();
    show(PRIMARY_CARD_ID);
    setDescription(PRIMARY_CARD_TEXT_ID, 'Gambar sedang diproses');
    const x = setInterval(() => {
      let current = parseInt(getCurrentProgress('progress-primary-card'));
      if (current < 60) {
        setProgressBar(PRIMARY_CARD_PROGRESS_ID, current + 1);
        setText(PRIMARY_CARD_TEXT_ID, `${current + 1}%`);
      } else {
        clearInterval(x);
      }
    }, 100);  

    return x
  }

  function resetAll () {
    reset();
    resetForm();
    $('#imgPreview').attr('src', 'https://via.placeholder.com/600x500/f0f0f0/000000?text=Foto+yang+anda+upload+akan+tampil+disini');
  }

  $(document).ready(function() {
    const csrf = $("meta[name='csrf-token']").attr('content');
    const file = $("#file");
    const name = $("#name");
    const age = $("#age");
    const gender = $("#gender");
    const skinLession = $("#skinLession");
    const submit = $("#submit");
    const reset = $("#reset");

    submit.click(function() {
      const interval = loading();
      const formData = new FormData();
      formData.append('name', name.val());
      formData.append('age', age.val());
      formData.append('gender', $('#gender option:selected').val());
      formData.append('skin_lession_position', $('#lession_position option:selected').val());
      formData.append('file', file[0].files[0]);
      formData.append('_token', csrf);
      axios.post('/api/v1/prediction', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then(function(response) {
        clearInterval(interval);
        const data = response.data;
        const pros = parseFloat(data.result.data.pros)
        const message = data.result.data.message
        console.log(message)
        setProgressBar('progress-primary-card', 100);
        hide('primary-card');
        if (pros > 80) {
          setProgressBar(DANGER_CARD_PROGRESS_ID, pros);
          setText(DANGER_CARD_TEXT_ID, `${pros}%`);
          setDescription(DANGER_CARD_DESCRIPTION_ID, message);
          show(DANGER_CARD_ID);
        } else if (pros > 60) {
          setProgressBar(WARNING_CARD_PROGRESS_ID, pros);
          setText(WARNING_CARD_TEXT_ID, `${pros}%`);
          setDescription(WARNING_CARD_DESCRIPTION_ID, message);
          show(WARNING_CARD_ID);
        } else {
          setProgressBar(SUCCESS_CARD_PROGRESS_ID, pros);
          setText(SUCCESS_CARD_TEXT_ID, `${pros}%`);
          setDescription(SUCCESS_CARD_DESCRIPTION_ID, message);
          show(SUCCESS_CARD_ID);
        }
        globTable.draw()
      }).catch(function(error) {
        console.log(error);
      });
    });

    file.change(function() {
      const files = file[0].files[0]
      if (files){
        let reader = new FileReader();
        reader.onload = function(event){
          console.log(event.target.result);
          $('#imgPreview').attr('src', event.target.result);
        }
        reader.readAsDataURL(files);
      }
    })

    reset.click(function() {
      resetAll()  
    });
  });

</script>
@endpush