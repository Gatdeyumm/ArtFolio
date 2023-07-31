<!DOCTYPE html>
<html>
<head>
    <title>Artworks Summary</title>
    <style>
        * {
            font-family: Arial, sans-serif;
            font-size: 10pt;
            line-height: 1.4;
            margin: 20px;
        }

        h1 {
            font-size: 20pt;
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 14pt;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #777;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #efefef;
        }
    </style>
</head>
<body>
    <p style="text-align: center; margin-bottom: 18pt">
        <img src="{{public_path('images/urbangallerylogo.jpg')}}" style="width: 150px;" alt=""> <br> <br>
        <strong style="font-size: 14pt">UrbanGallery, Inc.</strong> <br> 
        Seoul, South Korea<br>
        Tel. No. 782372772
    </p>
    <h1>Artwork Summary</h1>
    <table style='width: 6in'>
        <tr>
            <th>Title</th>
            <td>{{$client->title}}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{$client->description}}</td>
        </tr>
        <tr>
            <th>Artist</th>
            <td>{{$client->artist}}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{$client->price}}</td>
        </tr>
    </table>

    <br> <br> <br>
    <h2>TRANSACTIONS LOGS</h2>
    <table style="width: 95%">
        <thead>
            <tr style="background-color: #efefef">
                <th>Transaction Date</th>
                <th>Buyers</th>
                <th>Down Payment</th>
                <th>Status</th>
                <th>Payment Method</th>
            </tr>
        </thead>
        <tbody>
            @foreach($client->transactions as $txn)
            <tr>
                <td>{{$txn->transaction_date}}</td>
                <td>{{$txn->buyer}}</td>
                <td>{{$txn->amount}}</td>
                <td>{{$txn->status}}</td>
                <td>{{$txn->payment_method}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
