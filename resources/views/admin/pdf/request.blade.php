<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Request Details - PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            color: #333;
            line-height: 1.5;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #0F284B;
            padding-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            color: #0F284B;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .info-table th, .info-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .info-table th {
            background-color: #f1f5f9;
            width: 30%;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Client Request Summary</h2>
    </div>

    <table class="info-table">
        <tr>
            <th>Registration Number</th>
            <td>{{ $request->reg_number }}</td>
        </tr>
        <tr>
            <th>Client Name</th>
            <td>{{ $request->client_name }}</td>
        </tr>
        <tr>
            <th>FOP Type</th>
            <td>{{ $request->fop_type }}</td>
        </tr>
        <tr>
            <th>Request Date</th>
            <td>{{ \Carbon\Carbon::parse($request->request_date)->format('d M Y, h:i A') }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td style="color: green;">{{ ucfirst($request->status) }}</td>
        </tr>
    </table>

    <div class="footer">
        © {{ date('Y') }} Your Company Name. All Rights Reserved.
    </div>

</body>
</html>
