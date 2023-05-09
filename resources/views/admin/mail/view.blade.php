<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p style="margin-left: 40px;margin-top:20px">Trường</p>
    <p style="margin-left: 40px;">Địa chỉ</p>
    <h1 style="text-align:center;">Phiếu Báo Học Phí</h1>
    <p style="margin-left: 40px;">Mã biên lai: {{$bl->MaBL}}</p>
    <p style="margin-left: 40px;">Mã học sinh: {{$hs->MaHS}}</p>
    <p style="margin-left: 40px;">Tên học sinh: {{$hs->TenHS}}</p>
    <table style="border: 1px solid;width:600px;margin: 0 auto;">
        <tr>
            <th style="text-align:center;">STT</th>
            <th style="border-left: 1px solid;text-align:center;">Tên Lớp</th>
            <th style="border-left: 1px solid;text-align:center;">Số tiền</th>
        </tr>
        <?php
        $stt = 0;
        ?>
        @foreach($lh as $k => $v)
        <tr style="border-top: 1px solid;">
            <td style="text-align:center;border-top: 1px solid;">{{++$stt}}</td>
            <td style="border-left: 1px solid;border-top: 1px solid;text-align:center;">{{$v->TenLop}}</td>
            <td style="border-left: 1px solid;border-top: 1px solid;text-align:center;">{{number_format($v->HocPhi,$decimals=0,$dec_point=',',$thousand_sep='.').'đ'}}</td>
        </tr>
        @endforeach
    </table>
    <div class="footer" style="min-height: 200px;margin-top:40px">
        <p style="text-align:right;margin-right:150px">Người gửi</p>
        <p style="text-align:right;margin-right:130px">{{$nv->HoTenNV}}</p>

    </div>
    <form action="http://127.0.0.1:8000/payments" method="POST">
        @csrf
        <button type="submit" name="payUrl">Thanh Toán</button>
    </form>

</body>

</html>