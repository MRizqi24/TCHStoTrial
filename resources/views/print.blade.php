<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Barcode Work Order</title>
    <style type="text/css">
      * {
            font-size: 12px;
            font-family: Calibri, "Segoe UI", Arial, sans-serif;
        }

        td,
        th,
        tr,
        table {
            border: 1px solid black;

            border-collapse: collapse;
            width: 4cm
        }

        td.description,
        th.description {
            width: 100px;
            max-width:100px;
        }

        td.quantity,
        th.quantity {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
            margin: 0;
            padding: 0;
            font-size: 7px
        }

        .border-small{
            border: 1px solid black;
            border-collapse: collapse;
        }

        .item{
            padding: 3px;
        }

        .hr1{
            margin: 0px;
            border-top: 1px solid black

        }

        .ticket {
            width: 4cm;
            max-width: 4cm;
        }

        .header-item{
            display: flex;
            flex-direction: row;
            border-collapse: collapse;
            word-wrap: break-word;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @page {
			size: 4cm 10cm;
            margin: 3px;
		}

        @media print {
            body {
				width: 4cm;
				height: 10cm;
                margin: 3px;
			}
        }


    </style>
    <script src="{{asset('assets')}}/js/vendor/jquery.js"></script>
  </head>
  <body>
    <div class="ticket">
        <p class="centered description" style="font-weight:bold">HAS BEEN COUNTED</p>
        <p class="centered" style="font-weight:bold">PT TRIMITRA CHITRAHASTA</p>
        <table style="margin-bottom: -1px;">
            <thead>
                <tr>

                    <td colspan="2" class="centered description" style="width: 60px;">Part Name</td>
                    <td colspan="2" class="centered description" style="word-wrap: break-word">{{$result->part_name}}</td>


                </tr>
                <tr>

                    <td colspan="2" class="centered description" style="width: 60px;">Part Number</td>
                    <td colspan="2" class="centered description" style="word-wrap: break-word">{{$result->part_number}}</td>


                </tr>
            </thead>

        </table>
        <div class="header-item">
            <div class="item border-small" style="height: 50px">{!! QrCode::size(50)->generate($result->item_code); !!} </div>
            <div class="item border-small" style="margin-left: -1px; width: 86px">
                <p class="centered" style="font-weight:bold">Quantity</p>
                <hr class="hr1">
                <p class="centered" style="font-size: 18px">{{$result->qty}}</p>

            </div>
        </div>


        <table style="margin-top: -1px; margin-bottom: 3px;">
            <thead>
                <tr>

                    <td colspan="2" class="centered description" style="width: 59px">Lokasi</td>
                    <td colspan="2" class="centered description">{{$result->location}}</td>


                </tr>
                <tr>

                    <td colspan="2" class="centered description" style="width: 59px">PIC</td>
                    <td colspan="2" class="centered description">{{$result->created_by}}</td>


                </tr>
            </thead>

        </table>
    </div>
    <script>
        $(document).ready(function(){
            window.print();
        });
    </script>
  </body>
</html>
