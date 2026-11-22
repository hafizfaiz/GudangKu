<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ProductExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting
{
    public function collection(): Collection
    {
        return Product::with('category')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'SKU',
            'Nama Produk',
            'Kategori',
            'Deskripsi',
            'Harga Beli',
            'Harga Jual',
            'Stok',
            'Stok Minimum',
        ];
    }

    public function map($product): array
    {
        return [
            $product->id,
            $product->sku,
            $product->name,
            $product->category?->name ?? '-',
            $product->description,
            $product->purchase_price,
            $product->selling_price,
            $product->stock,
            $product->minimum_stock,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => '"Rp" #,##0',
            'G' => '"Rp" #,##0',
        ];
    }
}
