<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // INDEX (LIST + SEARCH)
    public function index(Request $request)
    {
        $query = DB::table('products');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orwhere('ID', 'like', '%' . $request->search . '%');
        }

        $products = $query->orderBy('id', 'desc')->paginate(10);

        return view('products.index', compact('products'));
    }

    // DELETE (SOFT DELETE)
    public function delete($id)
    {
        DB::table('products')
            ->where('id', $id)
            ->update(['deleted_at' => now()]);

        return redirect()->back()->with('success', 'Product moved to trash successfully!');
    }

    // TRASH PAGE
    public function trash()
    {
        $products = DB::table('products')
            ->whereNotNull('deleted_at')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('products.trash', compact('products'));
    }

    // RESTORE
    public function restore($id)
    {
        DB::table('products')
            ->where('id', $id)
            ->update(['deleted_at' => null]);

        return redirect()->back()->with('success', 'Product restored successfully!');
    }
}