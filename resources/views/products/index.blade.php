<!DOCTYPE html>
<html>
<head>
    <title>Products Dashboard</title>

    <style>
        body {
            font-family: Arial;
            background: #eef2f7;
            margin: 0;
        }

        .header {
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }

        .container {
            width: 85%;
            margin: 30px auto;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .btn {
            padding: 10px 14px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .btn-trash {
            background: #ef4444;
        }

        .btn-trash:hover {
            background: #dc2626;
        }

        input {
            padding: 10px;
            width: 250px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        button {
            padding: 10px 14px;
            border: none;
            background: #4f46e5;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow: hidden;
            border-radius: 10px;
        }

        th {
            background: #4f46e5;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #f9fafb;
        }

        .delete {
            background: #ef4444;
            padding: 6px 10px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
        }

        .delete:hover {
            background: #dc2626;
        }

        .success {
            background: #d1fae5;
            color: #065f46;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            text-align: center;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="header">📦 Product Management Dashboard</div>

<div class="container">

    <div class="card">

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <div class="top-bar">
            <form method="GET">
                <input type="text" name="search" placeholder="Search product...">
                <button>Search</button>
            </form>

            <a href="/admin/products/trash" class="btn btn-trash">🗑 View Trash</a>
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
                    <a href="/admin/products/delete/{{ $product->id }}" class="delete">Delete</a>
                </td>
            </tr>
            @endforeach

        </table>

        <div class="pagination">
            {{ $products->links() }}
        </div>

    </div>
</div>

</body>
</html>