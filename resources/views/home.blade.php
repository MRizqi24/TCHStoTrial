@extends('layout.master')

@section('title')
    STOCK OPNAME
@endsection('title')



@section('content')
    <h5>Selamat Datang <b>{{ Auth::user()->name }}</b>, Anda Login sebagai <b>{{ Auth::user()->role }}</b>.</h5>

    <div class="row">

    </div>
    {{-- tabel --}}
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-header-title">Stock Opaname</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col">
                            <div class="datatable datatable-primary">
                                <div class="table-responsive">
                                    <table id="StokOpname-data" class="table table-striped table-hover" style="width:100%">
                                        <thead class="text-center" style="text-transform: uppercase; font-size: 11px;">
                                            <tr style="width: 10%; background-color:rgb(0, 204, 255)" class="text-dark">
                                            <tr>
                                                <th width="10%">Item Code</th>
                                                <th width="20%" class="text-center">Part name</th>
                                                <th width="20%" class="text-center">Part number</th>
                                                <th width="10%">Type</th>
                                                <th width="10%">Qty</th>
                                                <th width="15%">Location</th>
                                                <th width="15%">User</th>
                                                <th width="10%">ACTION</th>
                                            </tr>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- create add --}}

    {{-- Isi Form Input start --}}

    <div class="card">
        <div class="card-body">
            <p class="text-muted font-14 mb-4">Masukkan data material .</p>
            <button type="button" id="button-scan-opname" class="btn btn-primary" data-toggle="modal" data-target="#cameraModal">
                Scan Kamera
            </button>

            <!--Modal scan-->
            <div class="modal fade" id="modalScanWorkOrderView" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Scan Work Order</h5>
                        </div>
                        <div class="modal-body" id="modal-body-scan">
                            <div id="qr-reader"></div>
                        </div>
                    </div>
                </div>
            </div>

            <form id="create-stokopname">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="itemcode_input" class="col-form-label">Item Code</label>
                    <input class="form-control" name="itemcode_input"type="text" value="" id="itemcode_input">
                </div>

                <div class="form-group">
                    <label for="itemcode_input" class="col-form-label">Part Name</label>
                    <input class="form-control" name="partname_input" type="text" value="" id="partname_input">
                </div>

                <div class="form-group">
                    <label for="partnumber_input" class="col-form-label">Part Number</label>
                    <input class="form-control" name="partnumber_input" type="text" value="" id="partnumber_input">
                </div>

                <div class="form-group">
                    <label for="itemcode_input" class="col-form-label">Type</label>
                    <input class="form-control" name="type_input" type="text" value="" id="type_input">
                </div>

                <div class="form-group">
                    <label for="quantity_input" class="col-form-label">Quantity</label>
                    <input class="form-control" name="quantity_input" type="number" value=""
                        id="quantity_input">
                </div>

                <div class="form-group">
                    <label for="location_input" class="col-form-label">Location</label>
                    <input class="form-control" name="location_input" type="text" value=""
                        id="location_input">
                </div>
                <div class="form-group">
                    <label for="location_input" class="col-form-label">User</label>
                    <input class="form-control" name="user"type="text" value="{{ Auth::user()->name }}"
                        id="user_input" readonly>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info submit"><i class="ti-check"></i>
                        Save</button>
                </div>
        </div>
    </div>
    </form>
    {{-- Isi Form Input end --}}
@endsection

<!-- Include necessary JavaScript files for DataTables and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function() {
    //create alert
    var prompt = loadPrompt();
    //scan camera
    $("#button-scan-opname").click(function(){
        Html5Qrcode.getCameras().then(devices => {
            /**
             * devices would be an array of objects of type:
             * { id: "id", label: "label" }
             */
            if (devices && devices.length) {
                var cameraId = devices[0].id;
                if(devices.length === 2){
                    var cameraId = devices[1].id;
                }
                //memanggil fungsi camera
                cameraAction(cameraId);
            }
        }).catch(err => {
            prompt.warn("Kamera bermasalah, cek izin kamera");
        });
        $("#modalScanWorkOrderView").modal({
            backdrop : "static",
            keyboard: false
        });
        $("#modalScanWorkOrderView").modal("show");
        prompt.inform("Tunggu...");
    });
    var table = $('#StokOpname-data').DataTable({
      serverside: true,
      responsive: true,
      ajax: {
        url: "{{ route('GetDataSto') }}"
      },
      columns: [
        {
          data: 'item_code',
          name: 'Code',
          className: "text-center",
        },
        {
          data: 'part_name',
          name: 'Type',
          className: "text-center",
        },
        {
          data: 'part_number',
          name: 'Type',
          className: "text-center",
        },
        {
          data: 'type',
          name: 'type',
          className: "text-left",
        },
        {
          data: 'qty',
          name: 'qty',
          className: "text-center",
        },
        {
          data: 'location',
          name: 'location',
          className: "text-center",
        },
        {
          data: 'created_by',
          name: 'user',
          className: "text-center",
        },
        {
          data: 'action',
          name: 'action'
        }
      ]
    });
    $('.modal-footer').on('click', '.submit', function() {
            // console.log(123);

            //validasi inputan tidak boleh kosong
            var Code = $('#itemcode_input').val();
            var partname_input = $('#partname_input').val();
            var partnumber_input = $('#partnumber_input').val();
            var quantity_input = $('#quantity_input').val();
            var location_input = $('#location_input').val();
            var user_input = $('#user_input').val();

            var condtion = !Code || !partname_input || !partnumber_input || !quantity_input || !location_input || !
                user_input;
            if (condtion) {
                prompt.warn("Perhatikan Inputan anda, Form tidak boleh ada yang kosong!");
                // Swal.fire({
                //     icon: 'warning',
                //     title: 'Perhatikan Inputan anda, Form tidak boleh ada yang kosong!'
                // });

            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // $('.addMasterdies').html('Saving...')
                $.ajax({
                    url: "{{ route('AddSto') }}",
                    type: "POST",
                    data: $('#create-stokopname').serialize(),
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);
                        // clear_Masteradd();
                        // console.log(data);
                        // alert('ok');
                        // Swal.fire(
                        //     'Successfully!',
                        //     'Data berhasil ditambahkan',
                        //     'success'
                        // ).then(function() {
                        //     $('#itemcode_input').val("");
                        //     $('#partname_input').val("");
                        //     $('#type_input').val("");
                        //     $('#quantity_input').val("");
                        //     $('#location_input').val("");
                        //     $('#masterdies-datatables').DataTable().ajax.reload();
                        // swal.fire({
                        //     icon: 'success',
                        //     title: 'Successfully',
                        //     timer: 2000,
                        //     text: 'Data berhasil ditambahkan'
                        // });
                        prompt.success("Data berhasil ditambahkan");
                        $('#itemcode_input').val("");
                        $('#partname_input').val("");
                        $('#partnumber_input').val("");
                        $('#type_input').val("");
                        $('#quantity_input').val("");
                        $('#location_input').val("");
                        $('#StokOpname-data').DataTable().ajax.reload();
                    }
                });
            }
        });



        //membuat fungsi scan qr code dengan kamera
        function cameraAction(cameraId) {
            const formatsToSupport = [
            Html5QrcodeSupportedFormats.QR_CODE,
            Html5QrcodeSupportedFormats.CODE_39,
            Html5QrcodeSupportedFormats.CODE_93,
            Html5QrcodeSupportedFormats.CODE_128,
            ];
            const html5QrCode = new Html5Qrcode(
                /* element id */
                "qr-reader",

            );
            prompt.inform("Kamera akan siap");
            const config = {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                },
                formatsToSupport: formatsToSupport
            }; //konfigurasi batas scan
            html5QrCode.start(
                    cameraId, config,
                    (decodedText, decodedResult) => {
                        html5QrCode.stop().then((ignore) => {
                            // QR Code scanning is stopped.

                            //data yang dihasilkan dari scan ada di variabel ini/data
                            var data = decodedText;
                            prompt.inform(data);

                        }).catch((err) => {
                            // Stop failed, handle it.
                            prompt.inform("Terdeteksi");
                        });
                    },
                    (errorMessage) => {
                        // parse error, ignore it.
                    })
                .catch((err) => {
                    // Start failed, handle it.
                    prompt.inform(err);
                });
        };
  });


</script>
