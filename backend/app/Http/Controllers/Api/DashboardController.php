<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function index(): JsonResponse{
        return response()->json([
            'success' => true,
            'message' => 'Ringkasan dashboard berhasil diambil.',
            'data' => [
                'total_products' => Product::count(),
                'total_categories' => Category::count(),
                'total_stock' => Product::sum('stock'),
                'total_low_stock_products' => Product::whereColumn('stock', '<=', 'minimum_stock')->count(),
                'inventory_value' => Product::selectRaw(
                'COALESCE(SUM(purchase_price * stock), 0) as total'
            )->value('total'),
            ],
        ]);
    }
}
