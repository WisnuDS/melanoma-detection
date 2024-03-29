"use strict";
var globTable;
var KTDatatablesBasicScrollable = function() {

    var initTable1 = function() {
        var table = $('#kt_datatable1');

        // begin first table
        var a = table.DataTable({
            serverSide: true,
            ajax: '/admin/users/data',
            columns: [
                {
                    data: 'id',
                    title: 'id',
                    visible: false,
                },
                {
                    data: 'id',
                    title: 'No',
                    render: function(data, type, full, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {data: 'name'},
                {
                    data: 'role',
                    title: 'Role',
                    render: function(data, type, full, meta) {
                        const role = JSON.parse(data);
                        return role.title
                    }
                },
                {
                    data: 'gender',
                    render: function(data, type, full, meta) {
                        var status = {
                            L: {'title': 'Laki-laki', 'state': 'primary'},
                            P: {'title': 'Perempuan', 'state': ' success'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }

                        return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
                            '<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
                    },
                },
                {
                    data: 'birth_date',
                    render: function(data, type, full, meta) {
                        return moment(data).format('DD MMMM YYYY');
                    },
                },
                {
                    data: 'email',
                    title: 'Email',
                },
                {
                    data: 'created_at',
                    title: 'Tanggal Join',
                    render(h) {
                        return moment(h).fromNow();
                    },
                },
                {
                    data: 'action',
                    title: 'Actions',
                    sortable: false,
                    render: function(data, type, full, meta) {
                        return `
                            <a href="${data.edit}" class="btn btn-sm
                            btn-clean btn-icon btn-icon-md" title="Edit details">
                                <i class="la la-edit
                                "></i>
                            </a>
                            <a href="javascript:;" class="btn btn-sm
                            btn-clean btn-icon btn-icon-md delete-btn" data-url="${data.delete}" title="Delete">

                                <i class="la la-trash"></i>
                            </a>
                        `;
                    },
                },
                // {data: 'Actions', responsivePriority: -1},
            ],
            order: [[7, 'desc']],
            scrollY: '100vh',
            scrollX: true,
            scrollCollapse: true,
            lengthChange: false,
            // columnDefs: [{
            //         targets: -1,
            //         title: 'Actions',
            //         orderable: false,
			// 		width: '125px',
            //         render: function(data, type, full, meta) {
			// 			return '\
	        //                 <div class="dropdown dropdown-inline">\
	        //                     <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown">\
	        //                         <span class="svg-icon svg-icon-md">\
	        //                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	        //                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	        //                                     <rect x="0" y="0" width="24" height="24"/>\
	        //                                     <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>\
	        //                                 </g>\
	        //                             </svg>\
	        //                         </span>\
	        //                     </a>\
	        //                     <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
	        //                         <ul class="navi flex-column navi-hover py-2">\
	        //                             <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">\
	        //                                 Choose an action:\
	        //                             </li>\
	        //                             <li class="navi-item">\
	        //                                 <a href="#" class="navi-link">\
	        //                                     <span class="navi-icon"><i class="la la-print"></i></span>\
	        //                                     <span class="navi-text">Print</span>\
	        //                                 </a>\
	        //                             </li>\
	        //                             <li class="navi-item">\
	        //                                 <a href="#" class="navi-link">\
	        //                                     <span class="navi-icon"><i class="la la-copy"></i></span>\
	        //                                     <span class="navi-text">Copy</span>\
	        //                                 </a>\
	        //                             </li>\
	        //                             <li class="navi-item">\
	        //                                 <a href="#" class="navi-link">\
	        //                                     <span class="navi-icon"><i class="la la-file-excel-o"></i></span>\
	        //                                     <span class="navi-text">Excel</span>\
	        //                                 </a>\
	        //                             </li>\
	        //                             <li class="navi-item">\
	        //                                 <a href="#" class="navi-link">\
	        //                                     <span class="navi-icon"><i class="la la-file-text-o"></i></span>\
	        //                                     <span class="navi-text">CSV</span>\
	        //                                 </a>\
	        //                             </li>\
	        //                             <li class="navi-item">\
	        //                                 <a href="#" class="navi-link">\
	        //                                     <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>\
	        //                                     <span class="navi-text">PDF</span>\
	        //                                 </a>\
	        //                             </li>\
	        //                         </ul>\
	        //                     </div>\
	        //                 </div>\
	        //                 <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
	        //                     <span class="svg-icon svg-icon-md">\
	        //                         <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	        //                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	        //                                 <rect x="0" y="0" width="24" height="24"/>\
	        //                                 <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
	        //                                 <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
	        //                             </g>\
	        //                         </svg>\
	        //                     </span>\
	        //                 </a>\
	        //                 <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
	        //                     <span class="svg-icon svg-icon-md">\
	        //                         <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	        //                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	        //                                 <rect x="0" y="0" width="24" height="24"/>\
	        //                                 <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
	        //                                 <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
	        //                             </g>\
	        //                         </svg>\
	        //                     </span>\
	        //                 </a>\
	        //             ';
            //         },
            //     },
            //     {
            //         targets: 8,
			// 		width: '75px',
            //         render: function(data, type, full, meta) {
            //             var status = {
            //                 1: {
            //                     'title': 'Pending',
            //                     'class': 'label-light-primary'
            //                 },
            //                 2: {
            //                     'title': 'Delivered',
            //                     'class': ' label-light-danger'
            //                 },
            //                 3: {
            //                     'title': 'Canceled',
            //                     'class': ' label-light-primary'
            //                 },
            //                 4: {
            //                     'title': 'Success',
            //                     'class': ' label-light-success'
            //                 },
            //                 5: {
            //                     'title': 'Info',
            //                     'class': ' label-light-info'
            //                 },
            //                 6: {
            //                     'title': 'Danger',
            //                     'class': ' label-light-danger'
            //                 },
            //                 7: {
            //                     'title': 'Warning',
            //                     'class': ' label-light-warning'
            //                 },
            //             };
            //             if (typeof status[data] === 'undefined') {
            //                 return data;
            //             }
            //             return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
            //         },
            //     },
            //     {
            //         targets: 9,
			// 		width: '75px',
            //         render: function(data, type, full, meta) {
            //             var status = {
            //                 1: {
            //                     'title': 'Online',
            //                     'state': 'danger'
            //                 },
            //                 2: {
            //                     'title': 'Retail',
            //                     'state': 'primary'
            //                 },
            //                 3: {
            //                     'title': 'Direct',
            //                     'state': 'success'
            //                 },
            //             };
            //             if (typeof status[data] === 'undefined') {
            //                 return data;
            //             }
            //             return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
            //                 '<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
            //         },
            //     },
            // ],
        });

        return a
    };

    return {

        //main function to initiate the module
        init: function() {
            return initTable1();
            // initTable2();
        },

    };

}();

function deleteUser(url) {
    return axios.delete(url)
    .then(function (response) {
      Swal.fire({
          title: "Success!",
          text: "Berhasil Merubah Status Diagnosis",
          icon: "success",
          confirmButtonText: "OK"
      });
    })
    .catch(function (error) {
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Terjadi Kesalah Saat Merubah Diagnosis',
          buttonsStyling: false,
          confirmButtonText: "Ok, got it!",
          customClass: {
              confirmButton: "btn font-weight-bold btn-light-primary"
          }
      })
    });
  }

jQuery(document).ready(function() {
    const table = KTDatatablesBasicScrollable.init();
    jQuery('#kt_datatable_search_query').on('keyup', function() {
        const search = jQuery(this).val();
        table.search(search).draw();
    });

    table.on('draw', function() {
        $('.delete-btn').on('click', function () {
            var url = $(this).data('url');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan menghapus data ini!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak, batalkan!',
                reverseButtons: true
            }).then((result) => {
                console.log(url);
                if (result.isConfirmed) {
                    return deleteUser(url);
                }
            }).then((result) => {
                table.draw();
            });
        })
    })
});
