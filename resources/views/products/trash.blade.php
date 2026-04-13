<!DOCTYPE html>
<html>
<head>
    <title>Trash Dashboard</title>

    <style>
        body {
            font-family: Arial;
            background: #f3f4f6; /* light white-gray */
            margin: 0;
            color: #111827;
        }

        .header {
            background: white;
            padding: 20px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .container {
            width: 85%;
            margin: 30px auto;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .top-bar {
            margin-bottom: 15px;
        }

        .btn-back {
            background: #2563eb;
            padding: 10px 14px;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover {
            background: #1d4ed8;
        }

        .success {
            background: #d1fae5;
            color: #065f46;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background: #ef4444;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
        }

        tr:hover {
            background: #f9fafb;
        }

        .restore {
            background: #22c55e;
            padding: 6px 10px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
        }

        .restore:hover {
            background: #16a34a;
        }
    </style>
</head>

<body>

<div class="header">🗑 Trash Products</div>

<div class="container">

    <div class="card">

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <div class="top-bar">
            <a href="/admin/products" class="btn-back">⬅ Back to Products</a>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>

            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    <a href="/admin/products/restore/{{ $product->id }}" class="restore">
                        Restore
                    </a>
                </td>
            </tr>
            @endforeach

        </table>

    </div>
</div>

</body>
</html>