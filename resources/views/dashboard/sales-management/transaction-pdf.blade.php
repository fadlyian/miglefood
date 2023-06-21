<!-- resources/views/transaction_pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Transaction Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Transaction Report</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Customer Name</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    {{-- <td>{{ $order->customer_name }}</td> --}}
                    <td>{{ $order->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
