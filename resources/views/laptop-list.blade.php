<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptops List PDF</title>
    <!-- Include the necessary CSS styles for the table -->
    <style>
        /* Style for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Style for table headers */
        th {
            background-color: #f2f2f2;
            padding: 8px;
            text-align: left;
        }

        /* Style for table cells */
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        /* Style for QR code images */
        .qr-code-img {
            width: 50px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Laptops</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>QR Code</th>
                <th>Brand Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laptops as $laptop)
                <tr>
                    <!-- Display QR code as an image -->
                    <td><img src="data:image/png;base64,{{ base64_encode(QrCode::size(100)->generate(Request::url() . '/laptops/' . $laptop->id)) }}" alt="QR Code" class="qr-code-img"></td>
                    <td>{{ $laptop->brand_name }}</td>             
                    <td>{{ $laptop->description }}</td>
                    <td>{{ $laptop->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
