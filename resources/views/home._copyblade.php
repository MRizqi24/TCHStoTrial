
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
                                                <th width="10%">Type</th>
                                                <th width="10%">Qty</th>
                                                <th width="15%">Location</th>
                                                <th width="15%">User</th>
                                                <th width="10%">ACTION</th>
                                            </tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($input_stock as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->itemcode }}</td>
                                            <td>{{ $item->partname }}</td>
                                            <td>{{ $item->typr }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->location }}</td>
                                            <td>{{ $item->user }}</td>
                                            <td>{{ $item->action }}</td> --}}

                                            {{-- <td> --}}
                                            {{-- <div class="text-center">
                                <!-- Button -->
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit-{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus-{{ $item->id }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                  </div>

                               <!-- Modal Edit -->
                               <form method="POST" action="/dashboard/crud/{{ $item->id }}/update" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="modal fade" id="modalEdit-{{ $item->id }}">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Edit Data : {{ $item->nama }}</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control rounded-0 @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $item->nama }}" placeholder="">
                                                  </div>
                                                <div class="form-group">
                                                    <label for="nama">Alamat</label>
                                                    <input type="text" class="form-control rounded-0 @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $item->alamat }}" placeholder="">
                                                  </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-warning">Update Data</button>
                                            </div>
                                          </div>
                                          <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                      </div>
                                      <!-- /.modal -->
                                    </form>
                                <!-- Modal Edit End -->

                               <!-- Modal Hapus -->
                               <form method="POST" action="/dashboard/crud/{{ $item->id }}/destroy" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('delete')
                                    <div class="modal fade" id="modalHapus-{{ $item->id }}">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Hapus Data : {{ $item->nama }}</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                            <p>Anda yakin akan menghapus data : {{ $item->nama }}</p>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-danger">Hapus Data</button>
                                            </div>
                                          </div>
                                          <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                      </div>
                                      <!-- /.modal -->
                                    </form>
                                <!-- Modal Hapus End -->
                        </td> --}}
                                            {{-- </tr>
                      @endforeach --}}
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
                Buka Modal Kamera
            </button>

            {{-- <!-- Modal -->
            <div class="modal" id="cameraModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal dengan Kotak Kamera</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="cameraBox" style="width: 100%; height: 150px;"></div>
                            <div id="result"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <!--Modal scan-->
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
            <!-- Kotak untuk menampilkan kamera --> --}}

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



{{-- <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script> --}}
<!-- Include necessary JavaScript files for DataTables and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
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
            //prompt.warn("Kamera bermasalah, cek izin kamera");
        });
        $("#modalScanWorkOrderView").modal({
            backdrop : "static",
            keyboard: false
        });
        $("#modalScanWorkOrderView").modal("show");
        //prompt.inform("Tunggu...");
    });

    $("#modalScanWorkOrderView").modal("hide");
  $(document).ready(function() {
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
  });

    // ADD STORE
    $(document).ready(function() {
        $('.modal-footer').on('click', '.submit', function() {
            // console.log(123);

            //validasi inputan tidak boleh kosong
            var Code = $('#itemcode_input').val();
            var partname_input = $('#partname_input').val();
            var quantity_input = $('#quantity_input').val();
            var location_input = $('#location_input').val();
            var user_input = $('#user_input').val();

            var condtion = !Code || !partname_input || !quantity_input || !location_input || !
                user_input;
            if (condtion) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Perhatikan Inputan anda, Form tidak boleh ada yang kosong!'
                });
                alert('no')
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
                        swal.fire({
                            icon: 'success',
                            title: 'Successfully',
                            timer: 2000,
                            text: 'Data berhasil ditambahkan'
                        });
                        $('#itemcode_input').val("");
                        $('#partname_input').val("");
                        $('#type_input').val("");
                        $('#quantity_input').val("");
                        $('#location_input').val("");
                        $('#StokOpname-data').DataTable().ajax.reload();
                    }
                });
            }
        });
        // document.adEventListener('DOMContentLoaded', function() {
        //     const cameraModal = new bootstrap.Modal(document.getElementById('cameraModal'));
        //     const qrCodeScanner = new Html5Qrcode('cameraBox');
        //     const resultDiv = document.getElementById('result');

        //     const scanButton = document.getElementById('scanButton');
        //     scanButton.addEventListener('click', function() {
        //         qrCodeScanner.scan(result => {
        //             resultDiv.innerHTML = result;
        //         }, error => {
        //             console.error(error);
        //         });
        //     });

        //     cameraModal.addEventListener('hide.bs.modal', function() {
        //         qrCodeScanner.stop();
        //         resultDiv.innerHTML = '';
        //     });

        //     cameraModal.addEventListener('shown.bs.modal', function() {
        //         qrCodeScanner.start({
        //                 facingMode: 'environment',
        //             }, {
        //                 fps: 10,
        //                 qrbox: 250,
        //             },
        //             (result) => {
        //                 resultDiv.innerHTML = result;
        //                 cameraModal.hide();
        //             },
        //             (error) => {
        //                 console.error(error);
        //             }
        //         );
        //     });
        // });


        //membuat fungsi scan qr code dengan kamera
        function cameraAction(cameraId) {
            const html5QrCode = new Html5Qrcode(
                /* element id */
                "qr-reader",
                /*scan type*/
                {
                    formatsToSupport: [Html5QrcodeSupportedFormats.QR_CODE]
                }
            );
            //prompt.inform("Kamera akan siap");
            const config = {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            }; //konfigurasi batas scan
            html5QrCode.start(
                    cameraId, config,
                    (decodedText, decodedResult) => {
                        html5QrCode.stop().then((ignore) => {
                            // QR Code scanning is stopped.
                            var data = decodedText;
                            var url = "/work_order/view/barcode/";
                            console.log(data);
                            view_workOrder(data, url);
                            //prompt.inform("Terdeteksi");
                            $("#modalScanWorkOrderView").modal("hide");
                        }).catch((err) => {
                            // Stop failed, handle it.
                            //prompt.inform("Terdeteksi");
                        });
                    },
                    (errorMessage) => {
                        // parse error, ignore it.
                    })
                .catch((err) => {
                    // Start failed, handle it.
                    prompt.inform(err);
                });
        }



    });
</script>
