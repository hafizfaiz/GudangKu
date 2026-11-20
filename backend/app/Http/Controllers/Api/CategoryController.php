<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = Category::with('products')->paginate(10);

        $categories->through(function ($category) {
            return new CategoryResource($category);
        });

        return response()->json([
            'success' => true,
            'message' => 'Daftar kategori berhasil diambil.',
            'data' => $categories,
        ]);
    }
    public function show(int $id): JsonResponse
    {
        $category = Category::with('products')->find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail kategori berhasil diambil.',
            'data' => new CategoryResource($category),
        ]);
    }
    public function store(Request $request): JsonResponse
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil ditambahkan.',
            'data' => new CategoryResource($category),
        ], 201);

    }
    public function update(Request $request, int $id): JsonResponse
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan.',
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil diperbarui.',
            'data' => new CategoryResource($category),
        ]);
    }
    public function destroy(int $id): JsonResponse
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan.',
            ], 404);
        }

    try {
        $category->delete();
    } catch (QueryException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Kategori tidak dapat dihapus karena masih memiliki produk.',
        ], 409);
    }

    return response()->json([
        'success' => true,
        'message' => 'Kategori berhasil dihapus.',
    ]);
    }
}
