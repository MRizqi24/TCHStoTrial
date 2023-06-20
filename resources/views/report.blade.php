@extends('layout.master')

@section('title')
    DATA STOCK
@endsection


@section('content')

<div class ="card mt-5 ">
    <div class="card-body">
        <h4 class="header-title">Export Stock Opname</h4>
    <form id="report_sto">
        @csrf
        @method('POST')

        <div class="form-row align-items-center">
            <div class="col-sm-2 my-1">
                <div class="form-group">
                    <label for="itemcode_input" class="col-form-label">Item Code</label>
                    <input class="form-control" name="itemcode_input"type="text" value="" id="itemcode_input">
                </div>
            </div>
            <div class="col-sm-3 my-1">
                <div class="form-group">
                    <label for="partname_input" class="col-form-label">Part Name</label>
                    <input class="form-control" name="partname_input" type="text" value="" id="partname_input" readonly>
                </div>
            </div>
            <div class="col-sm-2 my-1">
                <div class="form-group">
                    <label for="partname_input" class="col-form-label">From Date</label>
                    <input class="form-control" name="From_Date" type="date" value="" id="From_Date">
                </div>
            </div>
            <div class="col-sm-2 my-1">
                <div class="form-group">
                    <label for="partname_input" class="col-form-label">To Date</label>
                    <input class="form-control" name="To_Date" type="date" value="" id="To_Date">
                </div>
            </div>
            <div class="col-md-6 mt-6 form-group">
                <a href="#" class="btn btn-success btn-sm download" id="download_daily_excel"
                    style="font-size: 16px; padding: 10px 20px;">Print to Excel <i
                        class="fa-solid fa-file"></i></a>
                &nbsp;&nbsp;&nbsp;

                <a href="#" class="btn btn-success btn-sm download" id="download_daily_excel"
                    style="font-size: 16px; padding: 10px 20px;">Print All to Excel <i
                        class="fa-solid fa-file"></i></a>
                &nbsp;&nbsp;&nbsp;

            </div>

        </div>
    </form>
    </div>
</div>

<!--modal search item code-->
<div id="modalSearchPartName" class="modal fade bd-example-modal-lg show" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Item Code <i class="fa fa-search"></i></h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <div class="modal-body">
                <div class="single-table">
                    <div class="table-responsive">
                        <table id="search-part-name-table" class="display dataTable partName">
                            <thead class="">
                                <tr class="">
                                    <th>Item Code</th>
                                    <th>Nama Part</th>
                                    <th>Nomor Part</th>
                                    <th>Type</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#itemcode_input").focus(function(){ //mengambil data item code
            $("#modalSearchPartName").modal("toggle");
            $("#search-part-name-table").dataTable().fnDestroy();
            //route search part name
            var url = "{{route('GetDataSto')}}";
            part_name_table_history = $("#search-part-name-table").DataTable({
                dom: '<"toolbar">frtip',
                processing: true,
                serverSide: true,
                ajax: url,
                columns: [
                    // {"data": 'DT_RowIndex', orderable: false, searchable: false },
                    {"data": "item_code"},
                    {"data": "part_name"},
                    {"data": "part_number"},
                    {"data": "type"},

                ],
                "bDestroy": true,
            "initComplete": function(settings, json) {
                $('#search-part-name-table tbody').on('dblclick', 'tr', function () {
                    var dataArrWh = [];
                    var rowsdatakaryawan = $(this);
                    var rowData = part_name_table_history.rows(rowsdatakaryawan).data();
                    $.each($(rowData),function(key,value){
                        $('#itemcode_input').val(value["item_code"]);
                        $('#partname_input').val(value["part_name"]);
                        // $('#nip_riwayat').val(value["nip"]);
                        $('#modalSearchPartName').modal('hide');
                    });
                });
            }
            });

            $('div.toolbar').html('<b style="color:red">Klik 2x pada baris untuk memilih</b>');
        });
    });

    $(document).ready(function() {

        $('#download_daily_excel').on('click', function() {
            cekdata('excel');
        });

        function cekdata(type) {
            var name = document.getElementById('itemcode_input').value;
            var Type = document.getElementById('partname_input').value;
            var from_date = document.getElementById('From_Date').value;
            var to_date = document.getElementById('To_Date').value;



            if (name != "" && Type != "" && from_date != "" && to_date != "") {
                $.ajax({
                    url: "{{ route('checkData') }}",
                    type: "POST",
                    dataType: 'json',
                    data: $('#report_sto').serialize(),
                    success: function(data) {

                        if (data.status == 200) {
                            // Open the PDF in a new tab
                            window.open('/sto/' + name + '_' + Type + '_' +
                                from_date + '_' + to_date + '_' + type, '_blank');
                            // Reload the page
                            location.reload();
                        } else {
                            // Swal.fire({
                            //     icon: 'error',
                            //     title: 'Error!',
                            //     text: data.message,
                            // });
                        }
                    },
                })
            } else {
                // Swal.fire({
                //     icon: 'error',
                //     title: 'Warning!',
                //     text: 'form cannot be empty!!',
                // });
            }
        }
    });
</script>
@endsection
