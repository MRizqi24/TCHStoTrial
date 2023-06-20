@extends('layout.master')

@section('title')
    STOCK OPNAME
@endsection('title')



@section('content')
    <h5>Selamat Datang <b>{{ Auth::user()->name }}</b>, Anda Login sebagai <b>{{ Auth::user()->role }}</b>.</h5>

    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Riwayat Submit</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table id="StockOpname-data" class="display dataTable">
                        <thead>
                            <tr>
                                <th width="10%">Item Code</th>
                                <th width="20%" class="text-center">Part name</th>
                                <th width="20%" class="text-center">Part number</th>
                                <th width="10%">Type</th>
                                <th width="10%">Qty</th>
                                <th width="15%">Location</th>
                                <th width="15%">User</th>
                                <th width="15%">Tanggal dan Waktu</th>
                                <th width="10%">ACTION</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- create add --}}

    {{-- Isi Form Input start --}}
    <!--Modal scan-->
    <div class="modal fade" id="modalScanWorkOrderView" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Scan QR ItemCode</h5>
                </div>
                <div class="modal-body" id="modal-body-scan">
                    <div id="qr-reader"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p class="text-muted font-14 mb-4">Masukkan data material .</p>
            <button type="button" id="button-scan-opname" class="btn btn-primary" data-toggle="modal"
                data-target="#cameraModal">
                Scan Kamera
            </button>



            <form id="create-stokopname">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="itemcode_input" class="col-form-label">Item Code</label>
                    <input class="form-control" name="itemcode_input"type="text" value="" id="itemcode_input">
                </div>

                <div class="form-group">
                    <label for="itemcode_input" class="col-form-label">Part Name</label>
                    <input class="form-control" name="partname_input" type="text" value="" id="partname_input"
                        readonly>
                </div>

                <div class="form-group">
                    <label for="partnumber_input" class="col-form-label">Part Number</label>
                    <input class="form-control" name="partnumber_input" type="text" value="" id="partnumber_input"
                        readonly>
                </div>

                <div class="form-group">
                    <label for="itemcode_input" class="col-form-label">Type</label>
                    <input class="form-control" name="type_input" type="text" value="" id="type_input" readonly>
                </div>

                <div class="form-group">
                    <label for="quantity_input" class="col-form-label">Quantity</label>
                    <input class="form-control" name="quantity_input" type="number" value="" id="quantity_input">
                </div>

                <div class="form-group">
                    <label for="location_input" class="col-form-label">Location</label>
                    <input class="form-control" name="location_input" type="text" value="" id="location_input">
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
@include('STO.modal.modalitem')
<script>
    $(document).ready(function() {
        //create alert
        var prompt = loadPrompt();
        //scan camera
        $("#button-scan-opname").click(function() {
            Html5Qrcode.getCameras().then(devices => {
                /**
                 * devices would be an array of objects of type:
                 * { id: "id", label: "label" }
                 */
                if (devices && devices.length) {
                    var cameraId = devices[0].id;
                    if (devices.length === 2) {
                        var cameraId = devices[1].id;
                    }
                    //memanggil fungsi camera
                    cameraAction(cameraId);
                }
            }).catch(err => {
                prompt.warn("Kamera bermasalah, cek izin kamera");
            });
            $("#modalScanWorkOrderView").modal({
                backdrop: "static",
                keyboard: false
            });
            $("#modalScanWorkOrderView").modal("show");
            prompt.inform("Tunggu...");
        });
        var table = $('#StockOpname-data').DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 20, 50, 100, 200, 500],
            serverside: true,
            responsive: true,
            ajax: {
                url: "{{ route('GetDataSto') }}"
            },
            columns: [{
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
                    data: 'created_date',
                    name: 'Waktu',
                    className: "text-center",
                },

                {
                    data: 'action',
                    name: 'action',
                },
            ],
            order: [
                [7, 'desc']
            ] // Mengurutkan kolom ke-7 (waktu) secara descending
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

            var condtion = !Code || !partname_input || !partnumber_input || !quantity_input || !
                location_input || !
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
                        alert(data)

                        prompt.success("Data berhasil ditambahkan");
                        $('#itemcode_input').val("");
                        $('#partname_input').val("");
                        $('#partnumber_input').val("");
                        $('#type_input').val("");
                        $('#quantity_input').val("");
                        $('#location_input').val("");
                        $('#StockOpname-data').DataTable().ajax.reload();
                        // work_order_number = work_order_number.replaceAll("/","-")
                        var url = "{{ route('print_pdf', ['id' => '#id']) }}";
                        var url1 = url.replace("#id", data);
                        alert(url1);

                        window.open(url1, '_blank');
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
                            //mengganti spasi dengan tanda strip (-)
                            data = data.replaceAll(" ", "-");
                            //inisialisasi url
                            var url = "{{ route('SearcDataSto', ['itemcode' => '#itemcode']) }}";
                            //mengganti data yang akan dibawa ke controller atau url
                            url = url.replaceAll("#itemcode", data);
                            //mengirim data sesuai dengan url dan data
                            $.ajax({
                                type: "GET",
                                url: url,
                                success: function(data) {
                                    //menangkap data dan memasukkan ke textbox
                                    $('#itemcode_input').val(data.ITEMCODE);
                                    $('#partname_input').val(data.DESCRIPT);
                                    $('#partnumber_input').val(data.PART_NO);
                                    $('#type_input').val(data.DESCRIPT1);
                                    prompt.success("Data berhasil discan");
                                }
                            });
                            $("#modalScanWorkOrderView").modal("hide");

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


    //modal search itemcode
    $(document).ready(function() {
        $("#itemcode_input").focus(function() { //mengambil data item code
            $("#modalSearchPartName").modal("toggle");
            $("#search-part-name-table").dataTable().fnDestroy();
            //route search part name
            var url = "{{route('GetMasterItemCode') }}";
            part_name_table_history = $("#search-part-name-table").DataTable({
                dom: '<"toolbar">frtip',
                processing: true,
                serverSide: true,
                ajax: url,
                columns: [{
                        "data": 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        "data": "ITEMCODE"
                    },
                    {
                        "data": "DESCRIPT"
                    },
                    {
                        "data": "PART_NO"
                    },
                    {
                        "data": "DESCRIPT1"
                    },

                ],
                "bDestroy": true,
                "initComplete": function(settings, json) {
                    $('#search-part-name-table tbody').on('dblclick', 'tr', function() {
                        var dataArrWh = [];
                        var rowsdatakaryawan = $(this);
                        var rowData = part_name_table_history.rows(rowsdatakaryawan)
                            .data();
                        $.each($(rowData), function(key, value) {
                            $('#itemcode_input').val(value["ITEMCODE"]);
                            $('#partname_input').val(value["DESCRIPT"]);
                            $('#partnumber_input').val(value["PART_NO"]);
                            $('#type_input').val(value["DESCRIPT1"]);

                            $('#modalSearchPartName').modal('hide');
                        });
                    });
                }
            });

            $('div.toolbar').html('<b style="color:red">Klik 2x pada baris untuk memilih</b>');
        });
    });
</script>
