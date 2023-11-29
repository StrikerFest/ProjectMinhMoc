<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #abd373;

        }
        tr,td,th{
            border: 1px solid #abd373;
            padding: 8px;
        }
    </style>
</head>

<body>
    <h2>Thông báo đặt hàng thành công</h2>
    <h4>Danh sách sản phẩm đã đặt</h4>
    <table  class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item -> price }}</td>
                    <td>{{ $item -> quantity }}</td>
                    <td>{{ $item->quantity*$item-> price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Cảm ơn bạn đã đặt hàng ở trang web chúng tôi! </p>
    <p>Chúng tôi sẽ gửi cây đến với bạn sớm nhất có thể!</p>
    <p>Chúc bạn một ngày tốt lành!</p>
    <p>Liên hệ <a href="tel://0942603115">0942603115</a></p>
</body>

</html>
