<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/gutenberg-css@0.6">
    <style>
        *{ font-family: DejaVu Sans !important;}
        table {
            width: 100%;
            font-size: 18px;

            border-collapse: collapse;
        }
        td,
        th {
        padding: 16px 24px;
        }
        thead tr {
            background-color: #fafafa;
            color: #070707;
            font-size: 14px;
           
        }
        tbody td {
            text-align: center;
            font-size: 12px;
        }
        thead th {
            width: 25%;
        }

        tbody tr:nth-child(odd) {
            background-color: #f8f9fa;
        }

        tbody tr:nth-child(even) {
            background-color: #e9ecef;
        }

        footer {
            margin-top: 10px;
            text-align: center;
            font-style: italic;
        }
    </style>
</head>

<body>

    <!-- <img src="example.png"> -->

    <h1 style="text-align: center;">HÓA ĐƠN MUA HÀNG</h1>
    <h5 style="text-align: right; margin-right: 10%">Hà Nội, <?php
        // Set the new timezone
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('m-d-y');
        echo $date;
        ?></h5>
    <h3>Mã: {{$orders->id}}</h3>
    <h5>Khách hàng:  {{$orders->nameReceiver}}</h5>
    <h5>Địa chỉ: {{$orders->shipping_address}}</h5>
    <h5>Số điện thoại: {{$orders->phoneReceiver}}</h5>
    <h5>Trạng thái: {{config('app.order_status.'.$orders->order_status)}}</h5>
  
    <table border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total = 0.0;
            $stt =1;
            $totalP = 0.0;
            @endphp
            @foreach($order_detail as $order_details)
            <tr>
                <td>{{$stt++}}</td>
                <td>{{$order_details->product->name}}</td>
                <td>{{ number_format( $order_details->price).' '.'VND' }}</td>
                <td>{{$order_details->quality	}}</td>
                <td>{{ number_format( $order_details->quality * $order_details->price).' '.'VND'}}
                </td>
                @php
                $total += ($order_details->quality * $order_details->price);
                $totalP += $total;
                @endphp
            </tr>
            @endforeach
            <tr>
                <td style="text-align: left" colspan="4"><h5>Tiền SP</h5> </td>
                <td>{{number_format( $total).' '.'VND' }}</td>
            </tr>
            <tr>
                <td style="text-align: left" colspan="4">  <h5>Phí vẩn chuyển<span
                    style="font-size: 10px">({{$orders->shipping->name}})</span>:
            </h5></td>
                <td>{{number_format( $orders->shipping->price ).' '.'VND' }}</td>
            </tr>
            <tr>
                <td style="text-align: left" colspan="4"><h5>Giảm giá</h5> </td>
                <td>{{$orders->coupons}}</td>
            </tr>
            <tr>
                <td style="text-align: left" colspan="4"><h5>Tổng đơn</h5> </td>
                <td>{{number_format( $orders->subtotal + $orders->shipping->price).' '.'VND' }}</td>
            </tr>
        </tbody>
    </table>

    <footer>
       Cảm ơn quý khách!
    </footer>

</body>

</html>