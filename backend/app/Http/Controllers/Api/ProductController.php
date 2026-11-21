<?php

namespace App\Http\Controllers\Api;

use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(Request $request): JsonResponse {
        $query = Product::with('category');

        if ($request->has('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'ILIKE', "%{$search}%")
                    ->orWhere('sku', 'ILIKE', "%{$search}%");
            });
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        $validated = $request->validate([
            'sort_by' => 'sometimes|in:name,sku,purchase_price,selling_price,stock,created_at',
            'sort_order' => 'sometimes|in:asc,desc',
        ]);

        $sortBy = $validated['sort_by'] ?? 'created_at';
        $sortOrder = $validated['sort_order'] ?? 'desc';
        $query->orderBy($sortBy, $sortOrder);
        $products = $query->paginate(10)->appends($request->query());

        $products->through(function ($product) {
            return new ProductResource($product);
        });

        return response()->json([
            'success' => true,
            'message' => 'Daftar produk berhasil diambil.',
            'data' => $products,
        ]);
    }

    public function lowStock(): JsonResponse {
        $products = Product::with('category')
            ->whereColumn('stock', '<=', 'minimum_stock')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar produk dengan stok menipis berhasil diambil.',
            'data' => ProductResource::collection($products),
        ]);
    }

    public function show(int $id): JsonResponse {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail produk berhasil diambil.',
            'data' => new ProductResource($product),
        ]);
    }

    public function store(Request $request): JsonResponse {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sku' => 'required|string|max:255|unique:products,sku',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|gte:purchase_price',
            'stock' => 'required|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
        ]);

        $product = Product::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan.',
            'data' => new ProductResource($product->load('category')),
        ], 201);
    }
    public function update(Request $request, string $id): JsonResponse {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan.',
            ], 404);
        }

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sku' => 'required|string|max:255|unique:products,sku,' . $product->id,
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|gte:purchase_price',
            'stock' => 'required|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
        ]);

        $product->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diperbarui.',
            'data' => new ProductResource($product->load('category')),
        ]);
    }
    public function destroy(string $id): JsonResponse{
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan.',
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus.',
        ]);
    }
    public function export()
    {
        return Excel::download(
            new ProductExport,
            'laporan-produk-gudangku.xlsx'
        );
    }
}
