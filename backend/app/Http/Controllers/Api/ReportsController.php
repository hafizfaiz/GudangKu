<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ReportsController extends Controller
{
    public function stockSummary(): JsonResponse
    {
        $products = Product::with('category')->get();
        $lowStockProducts = $products->filter(
            fn ($product) => $product->stock <= $product->minimum_stock
        )->values();
        return response()->json([
            'success' => true,
            'message' => 'Laporan stok berhasil diambil.',
            'data' => [
                'total_products' => $products->count(),
                'total_categories' => Category::count(),
                'total_stock' => $products->sum('stock'),
                'total_low_stock_products' => $lowStockProducts->count(),
                'low_stock_products' => $lowStockProducts,
                'inventory_value' => $products->sum(
                    fn ($product) => $product->purchase_price * $product->stock
                ),
                'products' => $products,
            ],
        ]);
    }
}
