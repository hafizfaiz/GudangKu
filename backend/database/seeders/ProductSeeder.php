<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua kategori yang sudah dibuat
        $categories = Category::all()->keyBy('name');

        $products = [

            // ============================================================
            // 1. SMARTPHONE & TABLET
            // ============================================================
            [
                'category' => 'Smartphone & Tablet',
                'sku'      => 'SMT-001-IP',
                'name'     => 'Apple iPhone 15 Pro Max 256GB Natural Titanium',
                'desc'     => 'Smartphone flagship Apple dengan chip A17 Pro, kamera 48MP, layar Super Retina XDR 6.7 inci, baterai tahan lama, dan bodi titanium premium.',
                'buy'      => 18500000, 'sell' => 21999000, 'stock' => 45, 'min' => 10,
            ],
            [
                'category' => 'Smartphone & Tablet',
                'sku'      => 'SMT-002-SS',
                'name'     => 'Samsung Galaxy S24 Ultra 512GB Titanium Black',
                'desc'     => 'Flagship Samsung dengan S Pen terintegrasi, kamera 200MP, layar Dynamic AMOLED 6.8 inci, dan performa Snapdragon 8 Gen 3.',
                'buy'      => 17200000, 'sell' => 20499000, 'stock' => 32, 'min' => 8,
            ],
            [
                'category' => 'Smartphone & Tablet',
                'sku'      => 'SMT-003-XM',
                'name'     => 'Xiaomi 14 Ultra 512GB Black',
                'desc'     => 'Smartphone flagship Xiaomi dengan kamera Leica Summilux, Snapdragon 8 Gen 3, layar AMOLED 6.73 inci 120Hz, dan pengisian daya 90W.',
                'buy'      => 13500000, 'sell' => 15999000, 'stock' => 28, 'min' => 8,
            ],
            [
                'category' => 'Smartphone & Tablet',
                'sku'      => 'SMT-004-OP',
                'name'     => 'OnePlus 12 256GB Silky Black',
                'desc'     => 'Flagship OnePlus dengan Snapdragon 8 Gen 3, kamera Hasselblad 50MP, pengisian 100W SUPERVOOC, dan layar LTPO AMOLED 6.82 inci.',
                'buy'      => 10800000, 'sell' => 12999000, 'stock' => 20, 'min' => 5,
            ],
            [
                'category' => 'Smartphone & Tablet',
                'sku'      => 'SMT-005-RM',
                'name'     => 'Realme GT 6 128GB Fluid Silver',
                'desc'     => 'Smartphone performa tinggi dengan Snapdragon 8s Gen 3, layar AMOLED 6.78 inci 120Hz, baterai 5500mAh, dan pengisian 120W.',
                'buy'      => 5200000, 'sell' => 6499000, 'stock' => 55, 'min' => 15,
            ],
            [
                'category' => 'Smartphone & Tablet',
                'sku'      => 'SMT-006-IP',
                'name'     => 'Apple iPad Pro 12.9 inch M2 256GB WiFi',
                'desc'     => 'Tablet premium Apple dengan chip M2, layar Liquid Retina XDR 12.9 inci, dukungan Apple Pencil 2, dan Magic Keyboard.',
                'buy'      => 17800000, 'sell' => 20999000, 'stock' => 15, 'min' => 5,
            ],
            [
                'category' => 'Smartphone & Tablet',
                'sku'      => 'SMT-007-SS',
                'name'     => 'Samsung Galaxy Tab S9+ 256GB WiFi Beige',
                'desc'     => 'Tablet Android premium dengan layar Dynamic AMOLED 12.4 inci, Snapdragon 8 Gen 2, stylus S Pen, dan ketahanan IP68.',
                'buy'      => 11500000, 'sell' => 13999000, 'stock' => 18, 'min' => 5,
            ],
            [
                'category' => 'Smartphone & Tablet',
                'sku'      => 'SMT-008-XM',
                'name'     => 'Xiaomi Redmi Note 13 Pro 256GB Midnight Black',
                'desc'     => 'Smartphone mid-range dengan kamera 200MP, Dimensity 7200 Ultra, layar AMOLED 6.67 inci 120Hz, dan pengisian 67W.',
                'buy'      => 3800000, 'sell' => 4699000, 'stock' => 85, 'min' => 20,
            ],
            [
                'category' => 'Smartphone & Tablet',
                'sku'      => 'SMT-009-SS',
                'name'     => 'Samsung Galaxy A55 5G 256GB Awesome Navy',
                'desc'     => 'Smartphone 5G mid-range Samsung dengan Exynos 1480, kamera 50MP OIS, layar Super AMOLED 6.6 inci, dan bodi IP67.',
                'buy'      => 4900000, 'sell' => 5999000, 'stock' => 70, 'min' => 20,
            ],
            [
                'category' => 'Smartphone & Tablet',
                'sku'      => 'SMT-010-RN',
                'name'     => 'POCO X6 Pro 5G 256GB Yellow',
                'desc'     => 'Smartphone gaming dengan Dimensity 8300 Ultra, layar AMOLED 6.67 inci 144Hz, kamera 64MP, dan baterai 5100mAh.',
                'buy'      => 4500000, 'sell' => 5499000, 'stock' => 60, 'min' => 15,
            ],

            // ============================================================
            // 2. LAPTOP & KOMPUTER
            // ============================================================
            [
                'category' => 'Laptop & Komputer',
                'sku'      => 'LPC-001-AP',
                'name'     => 'Apple MacBook Pro 14 inch M3 Pro 18GB 512GB',
                'desc'     => 'Laptop premium Apple dengan chip M3 Pro, layar Liquid Retina XDR 14.2 inci, baterai hingga 18 jam, dan port Thunderbolt 4.',
                'buy'      => 32000000, 'sell' => 37999000, 'stock' => 12, 'min' => 3,
            ],
            [
                'category' => 'Laptop & Komputer',
                'sku'      => 'LPC-002-DL',
                'name'     => 'Dell XPS 15 Core i9 32GB 1TB RTX 4060',
                'desc'     => 'Laptop premium Dell dengan Intel Core i9-13900H, RAM 32GB, SSD 1TB, GPU RTX 4060, layar OLED 3.5K 60Hz.',
                'buy'      => 28500000, 'sell' => 33999000, 'stock' => 8, 'min' => 2,
            ],
            [
                'category' => 'Laptop & Komputer',
                'sku'      => 'LPC-003-AS',
                'name'     => 'ASUS ROG Zephyrus G16 Core i9 32GB 1TB RTX 4080',
                'desc'     => 'Laptop gaming tipis dengan Intel Core i9-14900HX, RTX 4080, layar ROG Nebula Display 240Hz, dan sistem pendingin ROG.',
                'buy'      => 36000000, 'sell' => 42999000, 'stock' => 6, 'min' => 2,
            ],
            [
                'category' => 'Laptop & Komputer',
                'sku'      => 'LPC-004-LN',
                'name'     => 'Lenovo ThinkPad X1 Carbon Gen 11 Core i7 16GB 512GB',
                'desc'     => 'Laptop bisnis ultra-ringan dengan Intel Core i7-1365U, RAM 16GB LPDDR5, SSD 512GB, layar IPS 14 inci, bersertifikasi MIL-SPEC.',
                'buy'      => 22000000, 'sell' => 26499000, 'stock' => 15, 'min' => 4,
            ],
            [
                'category' => 'Laptop & Komputer',
                'sku'      => 'LPC-005-HP',
                'name'     => 'HP Spectre x360 14 Core i7 16GB 512GB OLED',
                'desc'     => 'Laptop 2-in-1 premium HP dengan Core i7-1355U, layar OLED 2.8K touchscreen, pena HP MPP, dan desain konvertibel elegan.',
                'buy'      => 20500000, 'sell' => 24999000, 'stock' => 10, 'min' => 3,
            ],
            [
                'category' => 'Laptop & Komputer',
                'sku'      => 'LPC-006-AS',
                'name'     => 'ASUS VivoBook 15 Core i5 8GB 512GB',
                'desc'     => 'Laptop pelajar dan pekerja dengan Intel Core i5-1335U, RAM 8GB, SSD 512GB NVMe, layar FHD 15.6 inci, harga terjangkau.',
                'buy'      => 7800000, 'sell' => 9499000, 'stock' => 35, 'min' => 10,
            ],
            [
                'category' => 'Laptop & Komputer',
                'sku'      => 'LPC-007-AC',
                'name'     => 'Acer Aspire 5 Ryzen 5 16GB 512GB',
                'desc'     => 'Laptop serbaguna dengan AMD Ryzen 5 7530U, RAM 16GB DDR4, SSD 512GB, layar IPS FHD 15.6 inci, dan harga kompetitif.',
                'buy'      => 7200000, 'sell' => 8799000, 'stock' => 42, 'min' => 12,
            ],
            [
                'category' => 'Laptop & Komputer',
                'sku'      => 'LPC-008-AS',
                'name'     => 'ASUS TUF Gaming F15 Core i7 16GB 512GB RTX 4060',
                'desc'     => 'Laptop gaming tangguh dengan Intel Core i7-13700H, RTX 4060, layar FHD 144Hz, dan bodi MIL-SPEC untuk daya tahan tinggi.',
                'buy'      => 13500000, 'sell' => 16499000, 'stock' => 20, 'min' => 5,
            ],
            [
                'category' => 'Laptop & Komputer',
                'sku'      => 'LPC-009-PC',
                'name'     => 'PC Desktop Gaming Core i7 32GB 1TB RTX 4070',
                'desc'     => 'Komputer desktop rakitan gaming dengan Intel Core i7-14700K, RAM 32GB DDR5, SSD NVMe 1TB, GPU RTX 4070, casing ATX full-tower.',
                'buy'      => 20000000, 'sell' => 24999000, 'stock' => 7, 'min' => 2,
            ],
            [
                'category' => 'Laptop & Komputer',
                'sku'      => 'LPC-010-XM',
                'name'     => 'Xiaomi Book Pro 14 2024 Core Ultra 7 32GB 1TB',
                'desc'     => 'Laptop tipis Xiaomi dengan Intel Core Ultra 7, RAM 32GB LPDDR5X, SSD 1TB PCIe 4.0, layar OLED 14 inci 2.8K 90Hz.',
                'buy'      => 14000000, 'sell' => 16999000, 'stock' => 18, 'min' => 5,
            ],

            // ============================================================
            // 3. MONITOR & DISPLAY
            // ============================================================
            [
                'category' => 'Monitor & Display',
                'sku'      => 'MON-001-LG',
                'name'     => 'LG 27GP950-B UltraGear 4K 144Hz IPS Gaming Monitor 27"',
                'desc'     => 'Monitor gaming 4K premium dengan panel IPS Nano, refresh rate 144Hz, waktu respons 1ms (GtG), HDMI 2.1, dan kompatibel G-Sync & FreeSync.',
                'buy'      => 7800000, 'sell' => 9499000, 'stock' => 20, 'min' => 5,
            ],
            [
                'category' => 'Monitor & Display',
                'sku'      => 'MON-002-SS',
                'name'     => 'Samsung Odyssey G7 32" 240Hz QLED Curved Gaming',
                'desc'     => 'Monitor gaming curved 32 inci QLED dengan refresh rate 240Hz, resolusi QHD 2560x1440, waktu respons 1ms, dan lekukan 1000R.',
                'buy'      => 9500000, 'sell' => 11999000, 'stock' => 12, 'min' => 3,
            ],
            [
                'category' => 'Monitor & Display',
                'sku'      => 'MON-003-AS',
                'name'     => 'ASUS ProArt PA278CGV 27" QHD 165Hz IPS',
                'desc'     => 'Monitor kreatif dengan akurasi warna 100% sRGB, Calman Verified, panel IPS QHD, refresh rate 165Hz, dan port USB-C 90W.',
                'buy'      => 6200000, 'sell' => 7699000, 'stock' => 15, 'min' => 4,
            ],
            [
                'category' => 'Monitor & Display',
                'sku'      => 'MON-004-DL',
                'name'     => 'Dell UltraSharp U2723QE 27" 4K IPS Black',
                'desc'     => 'Monitor bisnis 4K IPS Black dengan akurasi warna DCI-P3 98%, USB-C 90W, KVM switch, dan sertifikasi ENERGY STAR.',
                'buy'      => 7200000, 'sell' => 8999000, 'stock' => 10, 'min' => 3,
            ],
            [
                'category' => 'Monitor & Display',
                'sku'      => 'MON-005-AC',
                'name'     => 'Acer Predator XB323QK 32" 4K 160Hz IPS',
                'desc'     => 'Monitor gaming 4K dengan panel IPS, refresh rate 160Hz, G-Sync Compatible, HDR400, dan port HDMI 2.1 untuk konsol next-gen.',
                'buy'      => 8800000, 'sell' => 10999000, 'stock' => 8, 'min' => 2,
            ],
            [
                'category' => 'Monitor & Display',
                'sku'      => 'MON-006-LG',
                'name'     => 'LG 24MK600M-B 24" FHD IPS Slim Monitor',
                'desc'     => 'Monitor kantor 24 inci IPS FHD dengan desain slim bezel, AMD FreeSync, dan output audio 5W. Cocok untuk pekerjaan produktivitas harian.',
                'buy'      => 1800000, 'sell' => 2299000, 'stock' => 50, 'min' => 15,
            ],
            [
                'category' => 'Monitor & Display',
                'sku'      => 'MON-007-SS',
                'name'     => 'Samsung S27B800PXU 27" 4K USB-C Smart Monitor',
                'desc'     => 'Smart monitor 27 inci 4K dengan fitur Smart TV, USB-C 65W, wireless DeX, AirPlay 2, dan koneksi mobile tanpa PC.',
                'buy'      => 5500000, 'sell' => 6799000, 'stock' => 14, 'min' => 4,
            ],

            // ============================================================
            // 4. KOMPONEN PC
            // ============================================================
            [
                'category' => 'Komponen PC',
                'sku'      => 'KPC-001-IN',
                'name'     => 'Intel Core i9-14900K Processor Raptor Lake Refresh',
                'desc'     => 'Processor desktop flagship Intel generasi ke-14 dengan 24 core (8P+16E), clock boost hingga 6.0GHz, socket LGA1700, TDP 125W.',
                'buy'      => 7800000, 'sell' => 9499000, 'stock' => 15, 'min' => 4,
            ],
            [
                'category' => 'Komponen PC',
                'sku'      => 'KPC-002-AM',
                'name'     => 'AMD Ryzen 9 7950X 16-Core 32-Thread Processor',
                'desc'     => 'Processor desktop AMD Zen 4 dengan 16 core 32 thread, clock boost 5.7GHz, TDP 170W, socket AM5, dan L3 cache 64MB.',
                'buy'      => 9200000, 'sell' => 11499000, 'stock' => 10, 'min' => 3,
            ],
            [
                'category' => 'Komponen PC',
                'sku'      => 'KPC-003-NV',
                'name'     => 'NVIDIA GeForce RTX 4090 24GB GDDR6X',
                'desc'     => 'Kartu grafis gaming paling powerful dari NVIDIA dengan 24GB VRAM, arsitektur Ada Lovelace, DLSS 3, dan performa ray tracing terbaik.',
                'buy'      => 25000000, 'sell' => 29999000, 'stock' => 5, 'min' => 1,
            ],
            [
                'category' => 'Komponen PC',
                'sku'      => 'KPC-004-NV',
                'name'     => 'NVIDIA GeForce RTX 4070 Super 12GB GDDR6X',
                'desc'     => 'Kartu grafis mid-high end NVIDIA dengan 12GB VRAM, 7168 CUDA cores, cocok untuk gaming 1440p dan konten kreatif.',
                'buy'      => 10500000, 'sell' => 12999000, 'stock' => 18, 'min' => 5,
            ],
            [
                'category' => 'Komponen PC',
                'sku'      => 'KPC-005-CO',
                'name'     => 'Corsair Vengeance RGB DDR5 32GB (2x16GB) 6000MHz',
                'desc'     => 'Kit RAM DDR5 dual channel dengan kecepatan 6000MHz CL30, RGB per-modul yang cantik, dan kompatibel Intel & AMD platform.',
                'buy'      => 2200000, 'sell' => 2799000, 'stock' => 40, 'min' => 10,
            ],
            [
                'category' => 'Komponen PC',
                'sku'      => 'KPC-006-AS',
                'name'     => 'ASUS ROG STRIX B650E-F WiFi DDR5 Motherboard',
                'desc'     => 'Motherboard AMD AM5 premium dengan PCIe 5.0, DDR5, WiFi 6E, 2.5G LAN, dan desain ROG yang ikonik untuk platform Ryzen 7000.',
                'buy'      => 4800000, 'sell' => 5999000, 'stock' => 12, 'min' => 3,
            ],
            [
                'category' => 'Komponen PC',
                'sku'      => 'KPC-007-SS',
                'name'     => 'Samsung 990 Pro NVMe SSD 2TB PCIe 4.0',
                'desc'     => 'SSD NVMe PCIe 4.0 dengan kecepatan baca 7450MB/s, tulis 6900MB/s, kapasitas 2TB, dan endurance hingga 1200 TBW.',
                'buy'      => 2800000, 'sell' => 3499000, 'stock' => 35, 'min' => 10,
            ],
            [
                'category' => 'Komponen PC',
                'sku'      => 'KPC-008-CO',
                'name'     => 'Corsair RM1000x 1000W 80+ Gold Modular PSU',
                'desc'     => 'Power supply modular 1000W bersertifikasi 80+ Gold dengan kabel fully-modular, proteksi OVP/UVP/OCP, dan garansi 10 tahun.',
                'buy'      => 2500000, 'sell' => 3199000, 'stock' => 20, 'min' => 5,
            ],
            [
                'category' => 'Komponen PC',
                'sku'      => 'KPC-009-NK',
                'name'     => 'Noctua NH-D15 CPU Air Cooler Dual Fan',
                'desc'     => 'CPU cooler air premium dengan dual fan NF-A15, TDP 250W+, kompatibel Intel LGA1700 dan AMD AM5, dilengkapi thermal paste.',
                'buy'      => 1200000, 'sell' => 1549000, 'stock' => 25, 'min' => 8,
            ],
            [
                'category' => 'Komponen PC',
                'sku'      => 'KPC-010-LI',
                'name'     => 'Lian Li PC-O11 Dynamic EVO XL Full Tower Case',
                'desc'     => 'Casing full tower premium dengan desain dual-chamber, support AIO besar, tempered glass panel, kompatibel E-ATX/ATX/mATX.',
                'buy'      => 2200000, 'sell' => 2799000, 'stock' => 15, 'min' => 4,
            ],

            // ============================================================
            // 5. JARINGAN & KONEKTIVITAS
            // ============================================================
            [
                'category' => 'Jaringan & Konektivitas',
                'sku'      => 'NET-001-TP',
                'name'     => 'TP-Link Deco XE75 Pro WiFi 6E Mesh System 2-Pack',
                'desc'     => 'Sistem mesh WiFi 6E tri-band dengan kecepatan hingga 5400Mbps, teknologi EasyMesh, dan cobertura hingga 500m² untuk rumah luas.',
                'buy'      => 3200000, 'sell' => 3999000, 'stock' => 25, 'min' => 6,
            ],
            [
                'category' => 'Jaringan & Konektivitas',
                'sku'      => 'NET-002-AS',
                'name'     => 'ASUS ROG Rapture GT-BE98 WiFi 7 Gaming Router',
                'desc'     => 'Router gaming WiFi 7 quad-band dengan kecepatan 25Gbps, port 10G SFP+, dual 2.5G WAN/LAN, dan software ROG Game Accelerator.',
                'buy'      => 8500000, 'sell' => 10499000, 'stock' => 8, 'min' => 2,
            ],
            [
                'category' => 'Jaringan & Konektivitas',
                'sku'      => 'NET-003-TP',
                'name'     => 'TP-Link TL-SG1024D 24-Port Gigabit Switch',
                'desc'     => 'Switch jaringan 24 port Gigabit unmanaged dengan kapasitas switching 48Gbps, forwarding rate 35.7Mpps, dan konsumsi daya rendah.',
                'buy'      => 650000, 'sell' => 849000, 'stock' => 30, 'min' => 8,
            ],
            [
                'category' => 'Jaringan & Konektivitas',
                'sku'      => 'NET-004-MK',
                'name'     => 'MikroTik hEX RB750Gr3 Router Gigabit 5-Port',
                'desc'     => 'Router mikrotik 5 port Gigabit untuk bisnis dan ISP kecil, dengan RouterOS level 4, dua core 880MHz, dan harga terjangkau.',
                'buy'      => 650000, 'sell' => 849000, 'stock' => 35, 'min' => 10,
            ],
            [
                'category' => 'Jaringan & Konektivitas',
                'sku'      => 'NET-005-TP',
                'name'     => 'TP-Link Archer AX6000 WiFi 6 Router Dual-Band',
                'desc'     => 'Router WiFi 6 AX6000 dengan 8 antena, 8 port LAN Gigabit, 2 port USB, dan teknologi MU-MIMO 4x4 untuk performa optimal.',
                'buy'      => 2200000, 'sell' => 2799000, 'stock' => 20, 'min' => 5,
            ],
            [
                'category' => 'Jaringan & Konektivitas',
                'sku'      => 'NET-006-UB',
                'name'     => 'Ubiquiti UniFi U6 Pro Access Point WiFi 6',
                'desc'     => 'Access point enterprise WiFi 6 dengan throughput 5.3Gbps, 4x4 MU-MIMO, 300+ concurrent clients, dan PoE powered.',
                'buy'      => 2800000, 'sell' => 3499000, 'stock' => 15, 'min' => 4,
            ],
            [
                'category' => 'Jaringan & Konektivitas',
                'sku'      => 'NET-007-TP',
                'name'     => 'TP-Link Tapo C500 Outdoor WiFi Camera CCTV',
                'desc'     => 'Kamera IP outdoor tahan cuaca IP66 dengan resolusi Full HD 1080p, infrared night vision 30m, dan rotasi pan/tilt 360°.',
                'buy'      => 350000, 'sell' => 449000, 'stock' => 80, 'min' => 20,
            ],

            // ============================================================
            // 6. PENYIMPANAN DATA
            // ============================================================
            [
                'category' => 'Penyimpanan Data',
                'sku'      => 'STR-001-WD',
                'name'     => 'WD Black SN850X NVMe SSD 2TB PCIe Gen4',
                'desc'     => 'SSD gaming premium Western Digital dengan kecepatan baca 7300MB/s, tulis 6600MB/s, dilengkapi heatsink, dan Game Mode 2.0.',
                'buy'      => 2600000, 'sell' => 3299000, 'stock' => 30, 'min' => 8,
            ],
            [
                'category' => 'Penyimpanan Data',
                'sku'      => 'STR-002-SS',
                'name'     => 'Seagate IronWolf Pro HDD 4TB NAS 7200RPM',
                'desc'     => 'Hard drive NAS enterprise dengan kapasitas 4TB, putaran 7200RPM, teknologi AgileArray, dan garansi 5 tahun untuk penggunaan 24/7.',
                'buy'      => 1200000, 'sell' => 1549000, 'stock' => 40, 'min' => 10,
            ],
            [
                'category' => 'Penyimpanan Data',
                'sku'      => 'STR-003-SS',
                'name'     => 'Samsung T7 Shield Portable SSD 2TB Blue',
                'desc'     => 'SSD portable dengan kecepatan transfer USB 3.2 Gen2 hingga 1050MB/s, bodi tahan benturan IP65, dan kapasitas 2TB.',
                'buy'      => 1600000, 'sell' => 1999000, 'stock' => 35, 'min' => 10,
            ],
            [
                'category' => 'Penyimpanan Data',
                'sku'      => 'STR-004-KI',
                'name'     => 'Kingston DataTraveler Max USB 3.2 Gen2 256GB',
                'desc'     => 'Flash drive USB 3.2 Gen2 kecepatan tinggi dengan baca 1000MB/s, tulis 900MB/s, kapasitas 256GB, dan desain metal premium.',
                'buy'      => 350000, 'sell' => 449000, 'stock' => 100, 'min' => 25,
            ],
            [
                'category' => 'Penyimpanan Data',
                'sku'      => 'STR-005-SD',
                'name'     => 'SanDisk Extreme Pro microSDXC 256GB A2 V30',
                'desc'     => 'Memory card microSD class A2 V30 dengan kecepatan baca 200MB/s, tulis 140MB/s, tahan air dan suhu ekstrem, kapasitas 256GB.',
                'buy'      => 450000, 'sell' => 579000, 'stock' => 85, 'min' => 20,
            ],
            [
                'category' => 'Penyimpanan Data',
                'sku'      => 'STR-006-WD',
                'name'     => 'WD My Cloud EX2 Ultra NAS 2-Bay 8TB',
                'desc'     => 'NAS 2-bay personal cloud storage dengan kapasitas total 8TB (2x4TB), prosesor dual-core 1.3GHz, 1GB RAM, dan port USB 3.0.',
                'buy'      => 4500000, 'sell' => 5699000, 'stock' => 10, 'min' => 2,
            ],
            [
                'category' => 'Penyimpanan Data',
                'sku'      => 'STR-007-CR',
                'name'     => 'Crucial BX500 SSD SATA 1TB 2.5"',
                'desc'     => 'SSD SATA terjangkau dengan kapasitas 1TB, kecepatan baca 540MB/s, tulis 500MB/s, cocok untuk upgrade laptop atau PC lama.',
                'buy'      => 650000, 'sell' => 849000, 'stock' => 60, 'min' => 15,
            ],

            // ============================================================
            // 7. AUDIO & SPEAKER
            // ============================================================
            [
                'category' => 'Audio & Speaker',
                'sku'      => 'AUD-001-SO',
                'name'     => 'Sony WH-1000XM5 Wireless Noise Cancelling Headphones',
                'desc'     => 'Headphone over-ear premium dengan ANC terbaik di kelasnya, audio Hi-Res, baterai 30 jam, dan multipoint Bluetooth 5.2.',
                'buy'      => 4200000, 'sell' => 4999000, 'stock' => 25, 'min' => 6,
            ],
            [
                'category' => 'Audio & Speaker',
                'sku'      => 'AUD-002-AP',
                'name'     => 'Apple AirPods Pro 2nd Gen with MagSafe Case',
                'desc'     => 'TWS earbuds premium Apple dengan ANC adaptif, Transparency mode, Personalized Spatial Audio, chip H2, dan casing MagSafe USB-C.',
                'buy'      => 3800000, 'sell' => 4499000, 'stock' => 30, 'min' => 8,
            ],
            [
                'category' => 'Audio & Speaker',
                'sku'      => 'AUD-003-JB',
                'name'     => 'JBL Charge 5 Portable Bluetooth Speaker',
                'desc'     => 'Speaker bluetooth portabel dengan baterai 20 jam, tahan air IP67, teknologi PartyBoost, dan fitur powerbank untuk isi daya perangkat.',
                'buy'      => 1600000, 'sell' => 1999000, 'stock' => 40, 'min' => 10,
            ],
            [
                'category' => 'Audio & Speaker',
                'sku'      => 'AUD-004-BO',
                'name'     => 'Bose QuietComfort 45 Wireless Headphones Black',
                'desc'     => 'Headphone wireless premium Bose dengan ANC world-class, audio TriPort, baterai 24 jam, dan desain ringan yang nyaman dipakai lama.',
                'buy'      => 4000000, 'sell' => 4799000, 'stock' => 18, 'min' => 5,
            ],
            [
                'category' => 'Audio & Speaker',
                'sku'      => 'AUD-005-SS',
                'name'     => 'Samsung HW-Q990C Soundbar 11.1.4 Dolby Atmos',
                'desc'     => 'Soundbar premium 11.1.4 channel dengan Dolby Atmos & DTS:X, output 656W, wireless surround, dan SpaceFit Sound Pro.',
                'buy'      => 10000000, 'sell' => 12499000, 'stock' => 6, 'min' => 1,
            ],
            [
                'category' => 'Audio & Speaker',
                'sku'      => 'AUD-006-XM',
                'name'     => 'Xiaomi Buds 4 Pro TWS ANC Earbuds',
                'desc'     => 'TWS earbuds dengan ANC hingga 48dB, driver planar dynamic, audio Hi-Res Wireless, baterai total 38 jam, dan koneksi Xiaomi Fast Connect.',
                'buy'      => 950000, 'sell' => 1199000, 'stock' => 55, 'min' => 15,
            ],
            [
                'category' => 'Audio & Speaker',
                'sku'      => 'AUD-007-YA',
                'name'     => 'Yamaha HS8 Studio Monitor Speaker Pair',
                'desc'     => 'Monitor studio 8 inci bi-amplified dengan akurasi referensi, respons frekuensi 38Hz-30kHz, dan desain yang sudah teruji di studio profesional.',
                'buy'      => 7500000, 'sell' => 9299000, 'stock' => 8, 'min' => 2,
            ],

            // ============================================================
            // 8. KAMERA & FOTOGRAFI
            // ============================================================
            [
                'category' => 'Kamera & Fotografi',
                'sku'      => 'CAM-001-SO',
                'name'     => 'Sony Alpha A7 IV Full Frame Mirrorless Body',
                'desc'     => 'Kamera mirrorless full frame 33MP dengan video 4K 60fps, Real-time Tracking AF, 10fps burst, baterai Z, dan dual card slot.',
                'buy'      => 32000000, 'sell' => 37999000, 'stock' => 8, 'min' => 2,
            ],
            [
                'category' => 'Kamera & Fotografi',
                'sku'      => 'CAM-002-CN',
                'name'     => 'Canon EOS R6 Mark II Body Mirrorless',
                'desc'     => 'Kamera mirrorless Canon dengan sensor 24.2MP, video 4K 60fps RAW, burst 40fps, IBIS 8-stop, dan AF cerdas dengan subject recognition.',
                'buy'      => 29000000, 'sell' => 34499000, 'stock' => 6, 'min' => 1,
            ],
            [
                'category' => 'Kamera & Fotografi',
                'sku'      => 'CAM-003-DJ',
                'name'     => 'DJI Air 3 Combo Drone 4K Camera',
                'desc'     => 'Drone dual-camera dengan sensor 1/1.3" utama dan kamera medium tele, video 4K 60fps HDR, penerbangan hingga 46 menit, dan Anti-Collision.',
                'buy'      => 14000000, 'sell' => 16999000, 'stock' => 10, 'min' => 2,
            ],
            [
                'category' => 'Kamera & Fotografi',
                'sku'      => 'CAM-004-GP',
                'name'     => 'GoPro HERO12 Black Action Camera',
                'desc'     => 'Action camera terbaru GoPro dengan video 5.3K 60fps, foto 27MP, HyperSmooth 6.0, waterproof hingga 10m, dan koneksi Bluetooth/WiFi.',
                'buy'      => 5800000, 'sell' => 6999000, 'stock' => 20, 'min' => 5,
            ],
            [
                'category' => 'Kamera & Fotografi',
                'sku'      => 'CAM-005-SO',
                'name'     => 'Sony FE 24-70mm f/2.8 GM II Lens',
                'desc'     => 'Lensa zoom standar profesional Sony G Master generasi kedua, lebih ringan 20% dari pendahulunya, dengan apertur konstan f/2.8 dan AF XD Linear Motor.',
                'buy'      => 25000000, 'sell' => 29999000, 'stock' => 4, 'min' => 1,
            ],
            [
                'category' => 'Kamera & Fotografi',
                'sku'      => 'CAM-006-BN',
                'name'     => 'Benro Mach3 TMA38CL Carbon Fiber Tripod',
                'desc'     => 'Tripod karbon fiber profesional dengan beban maksimal 20kg, tinggi maksimal 180cm, ball head dengan arca-swiss, dan travel bag.',
                'buy'      => 2800000, 'sell' => 3499000, 'stock' => 15, 'min' => 4,
            ],

            // ============================================================
            // 9. PERIFERAL KOMPUTER
            // ============================================================
            [
                'category' => 'Periferal Komputer',
                'sku'      => 'PRF-001-LG',
                'name'     => 'Logitech MX Keys S Wireless Keyboard',
                'desc'     => 'Keyboard wireless premium dengan tombol backlit adaptif, Smart Actions, Bluetooth 5.0 multi-device 3 perangkat, dan baterai hingga 10 hari.',
                'buy'      => 1600000, 'sell' => 1999000, 'stock' => 35, 'min' => 10,
            ],
            [
                'category' => 'Periferal Komputer',
                'sku'      => 'PRF-002-LG',
                'name'     => 'Logitech MX Master 3S Wireless Mouse',
                'desc'     => 'Mouse wireless flagship Logitech dengan scroll MagSpeed elektromagnetik, 8000 DPI, 7 tombol programmable, dan baterai 70 hari.',
                'buy'      => 1300000, 'sell' => 1649000, 'stock' => 40, 'min' => 12,
            ],
            [
                'category' => 'Periferal Komputer',
                'sku'      => 'PRF-003-RZ',
                'name'     => 'Razer DeathAdder V3 Pro Wireless Gaming Mouse',
                'desc'     => 'Mouse gaming wireless ergonomis 63g dengan Focus Pro 35K Optical sensor, HyperSpeed wireless, dan tombol optik generasi ke-3.',
                'buy'      => 1800000, 'sell' => 2249000, 'stock' => 28, 'min' => 8,
            ],
            [
                'category' => 'Periferal Komputer',
                'sku'      => 'PRF-004-KY',
                'name'     => 'Keychron Q3 Pro QMK Wireless Mechanical Keyboard TKL',
                'desc'     => 'Keyboard mechanical TKL premium wireless dengan hot-swap socket, gasket mount, RGB per-key, QMK/VIA support, dan bodi aluminum.',
                'buy'      => 2200000, 'sell' => 2799000, 'stock' => 20, 'min' => 5,
            ],
            [
                'category' => 'Periferal Komputer',
                'sku'      => 'PRF-005-LG',
                'name'     => 'Logitech C920s HD Pro Webcam 1080p',
                'desc'     => 'Webcam Full HD 1080p 30fps dengan autofocus dan koreksi cahaya otomatis, tutup privasi, dan mikrofon stereo ganda untuk video call jernih.',
                'buy'      => 950000, 'sell' => 1199000, 'stock' => 45, 'min' => 12,
            ],
            [
                'category' => 'Periferal Komputer',
                'sku'      => 'PRF-006-EP',
                'name'     => 'Epson EcoTank L6290 All-in-One Printer',
                'desc'     => 'Printer inkjet all-in-one dengan sistem tangki tinta EcoTank refillable, cetak duplex otomatis, WiFi, dan koneksi mobile print.',
                'buy'      => 3200000, 'sell' => 3999000, 'stock' => 15, 'min' => 4,
            ],
            [
                'category' => 'Periferal Komputer',
                'sku'      => 'PRF-007-WC',
                'name'     => 'Wacom Intuos Pro Large Creative Pen Tablet',
                'desc'     => 'Graphics tablet profesional dengan area aktif besar, stylus Pro Pen 3 8192 pressure, Bluetooth, dan kompatibel Adobe & Clip Studio.',
                'buy'      => 4500000, 'sell' => 5499000, 'stock' => 10, 'min' => 2,
            ],
            [
                'category' => 'Periferal Komputer',
                'sku'      => 'PRF-008-HP',
                'name'     => 'HP LaserJet MFP M236d A4 Mono All-in-One',
                'desc'     => 'Printer laser monokrom all-in-one dengan kecepatan 29ppm, duplex otomatis, ADF 40 lembar, dan konektivitas USB untuk kantor kecil.',
                'buy'      => 2000000, 'sell' => 2499000, 'stock' => 20, 'min' => 5,
            ],

            // ============================================================
            // 10. GAMING
            // ============================================================
            [
                'category' => 'Gaming',
                'sku'      => 'GMG-001-SO',
                'name'     => 'Sony PlayStation 5 Slim Disc Edition 1TB',
                'desc'     => 'Konsol game generasi terbaru Sony dengan PS5 Slim yang lebih ringan, SSD 1TB, dukungan 4K 120fps, dan backward compatibility PS4.',
                'buy'      => 7800000, 'sell' => 9499000, 'stock' => 20, 'min' => 5,
            ],
            [
                'category' => 'Gaming',
                'sku'      => 'GMG-002-MS',
                'name'     => 'Microsoft Xbox Series X 1TB',
                'desc'     => 'Konsol gaming Microsoft paling powerful dengan 12 teraflops GPU, SSD 1TB, Quick Resume, 4K/120fps, dan Game Pass Ultimate support.',
                'buy'      => 7500000, 'sell' => 8999000, 'stock' => 15, 'min' => 4,
            ],
            [
                'category' => 'Gaming',
                'sku'      => 'GMG-003-NT',
                'name'     => 'Nintendo Switch OLED Model White',
                'desc'     => 'Konsol hybrid Nintendo dengan layar OLED 7 inci, 64GB storage, LAN port di dock, dan speaker lebih jernih untuk pengalaman gaming portabel.',
                'buy'      => 4000000, 'sell' => 4799000, 'stock' => 25, 'min' => 6,
            ],
            [
                'category' => 'Gaming',
                'sku'      => 'GMG-004-RZ',
                'name'     => 'Razer BlackShark V2 Pro Wireless Gaming Headset',
                'desc'     => 'Headset gaming wireless 50mm driver titanium, THX Spatial Audio, SmartSwitch dual wireless, baterai 70 jam, untuk PS5/Xbox/PC.',
                'buy'      => 3000000, 'sell' => 3699000, 'stock' => 22, 'min' => 6,
            ],
            [
                'category' => 'Gaming',
                'sku'      => 'GMG-005-LG',
                'name'     => 'Logitech G Pro X Superlight 2 Wireless Mouse 60g',
                'desc'     => 'Mouse gaming wireless ultra-ringan 60g dengan Hero 2 25600 DPI sensor, 95+ jam baterai, LIGHTSPEED wireless, dan polling rate 2000Hz.',
                'buy'      => 2200000, 'sell' => 2749000, 'stock' => 30, 'min' => 8,
            ],
            [
                'category' => 'Gaming',
                'sku'      => 'GMG-006-CO',
                'name'     => 'Corsair K95 RGB Platinum XT Gaming Keyboard',
                'desc'     => 'Keyboard gaming full-size dengan switch Cherry MX Red, macro keys 6 tombol, RGB per-key, volume roller, dan media controls premium.',
                'buy'      => 2500000, 'sell' => 3099000, 'stock' => 18, 'min' => 5,
            ],
            [
                'category' => 'Gaming',
                'sku'      => 'GMG-007-SO',
                'name'     => 'Sony DualSense Edge Wireless Controller PS5',
                'desc'     => 'Controller gaming premium PS5 dengan tombol belakang, trigger stop, dead zone customizable, stik replaceable, dan kabel braided USB-C.',
                'buy'      => 2800000, 'sell' => 3499000, 'stock' => 20, 'min' => 5,
            ],

            // ============================================================
            // 11. SMART HOME & IoT
            // ============================================================
            [
                'category' => 'Smart Home & IoT',
                'sku'      => 'IOT-001-XM',
                'name'     => 'Xiaomi Smart Gateway Hub 3 Zigbee 3.0',
                'desc'     => 'Gateway hub smart home Xiaomi untuk menghubungkan semua perangkat IoT Zigbee, kompatibel Apple HomeKit, Google Home, dan Amazon Alexa.',
                'buy'      => 350000, 'sell' => 449000, 'stock' => 50, 'min' => 15,
            ],
            [
                'category' => 'Smart Home & IoT',
                'sku'      => 'IOT-002-TP',
                'name'     => 'Tapo P110 Smart Plug Energy Monitoring 16A',
                'desc'     => 'Smart plug WiFi dengan monitoring konsumsi daya, jadwal otomatis, timer, voice control Alexa/Google, dan proteksi overload 16A.',
                'buy'      => 120000, 'sell' => 159000, 'stock' => 150, 'min' => 40,
            ],
            [
                'category' => 'Smart Home & IoT',
                'sku'      => 'IOT-003-AM',
                'name'     => 'Amazon Echo Show 10 (3rd Gen) Smart Display 10"',
                'desc'     => 'Smart display 10 inci yang bisa berputar mengikuti posisi Anda, kamera 13MP video call, Alexa, Zigbee hub, dan speaker stereo premium.',
                'buy'      => 3500000, 'sell' => 4299000, 'stock' => 15, 'min' => 4,
            ],
            [
                'category' => 'Smart Home & IoT',
                'sku'      => 'IOT-004-XM',
                'name'     => 'Xiaomi Smart Air Purifier 4 Pro HEPA H13',
                'desc'     => 'Purifier udara dengan filter HEPA H13, sensor PM2.5 real-time, CADR 500m³/h, kontrol via app Xiaomi Home, dan mode auto otomatis.',
                'buy'      => 2200000, 'sell' => 2799000, 'stock' => 20, 'min' => 5,
            ],
            [
                'category' => 'Smart Home & IoT',
                'sku'      => 'IOT-005-TP',
                'name'     => 'Tapo C225 2K QHD Pan/Tilt AI Camera Indoor',
                'desc'     => 'Kamera IP indoor 2K QHD dengan AI detection (manusia, hewan), pan/tilt 360°, two-way audio, night vision, dan penyimpanan lokal SD card.',
                'buy'      => 450000, 'sell' => 579000, 'stock' => 60, 'min' => 15,
            ],
            [
                'category' => 'Smart Home & IoT',
                'sku'      => 'IOT-006-YE',
                'name'     => 'Yeelight LED Strip Plus 2m RGB Addressable',
                'desc'     => 'LED strip 2 meter RGB addressable 60 LED/m dengan pengaturan warna 16 juta, sinkronisasi musik, dan kontrol via Mi Home/Apple HomeKit.',
                'buy'      => 280000, 'sell' => 359000, 'stock' => 100, 'min' => 25,
            ],

            // ============================================================
            // 12. POWER & BATERAI
            // ============================================================
            [
                'category' => 'Power & Baterai',
                'sku'      => 'PWR-001-AN',
                'name'     => 'Anker 737 Power Bank 24000mAh 140W',
                'desc'     => 'Powerbank kapasitas besar 24000mAh dengan output 140W, smart display, pengisian laptop via USB-C, dan dukungan PD 3.1.',
                'buy'      => 1600000, 'sell' => 1999000, 'stock' => 30, 'min' => 8,
            ],
            [
                'category' => 'Power & Baterai',
                'sku'      => 'PWR-002-AN',
                'name'     => 'Anker 747 Charger GaNPrime 150W 4-Port',
                'desc'     => 'Charger desktop GaN 150W dengan 4 port (2 USB-C + 2 USB-A), teknologi ActiveShield 2.0, dan distribusi daya dinamis untuk semua perangkat.',
                'buy'      => 950000, 'sell' => 1199000, 'stock' => 40, 'min' => 10,
            ],
            [
                'category' => 'Power & Baterai',
                'sku'      => 'PWR-003-APC',
                'name'     => 'APC Back-UPS 1500VA 865W UPS LCD',
                'desc'     => 'UPS 1500VA/865W dengan LCD status display, 10 outlet proteksi lonjakan arus, AVR, koneksi USB, dan garansi 3 tahun.',
                'buy'      => 2800000, 'sell' => 3499000, 'stock' => 15, 'min' => 4,
            ],
            [
                'category' => 'Power & Baterai',
                'sku'      => 'PWR-004-XM',
                'name'     => 'Xiaomi 33W Fast Charger with Cable 1m',
                'desc'     => 'Charger kepala 33W dengan teknologi fast charging multi-protocol (PD, QC, AFC), kabel USB-C 1 meter, dan proteksi keamanan berlapis.',
                'buy'      => 120000, 'sell' => 159000, 'stock' => 200, 'min' => 50,
            ],
            [
                'category' => 'Power & Baterai',
                'sku'      => 'PWR-005-APC',
                'name'     => 'APC Smart-UPS 3000VA RM 2U 230V',
                'desc'     => 'UPS rack-mount 2U enterprise 3000VA dengan pure sine wave, remote monitoring SNMP, bypass switch, dan LCD layar informatif.',
                'buy'      => 18000000, 'sell' => 21999000, 'stock' => 3, 'min' => 1,
            ],
            [
                'category' => 'Power & Baterai',
                'sku'      => 'PWR-006-BS',
                'name'     => 'Baseus 65W GaN3 Pro Desktop Fast Charger',
                'desc'     => 'Charger meja GaN 65W dengan 2 USB-C + 1 USB-A, layar LED daya, foldable prong, dan dukungan PD/QC/PPS/SCP protocol.',
                'buy'      => 350000, 'sell' => 449000, 'stock' => 80, 'min' => 20,
            ],

            // ============================================================
            // 13. TV & HIBURAN
            // ============================================================
            [
                'category' => 'TV & Hiburan',
                'sku'      => 'TVH-001-LG',
                'name'     => 'LG C3 65" OLED evo Smart TV 4K 120Hz',
                'desc'     => 'TV OLED premium 65 inci dengan panel evo generasi terbaru, α9 AI Processor Gen6, Dolby Vision IQ, Dolby Atmos, dan 4 port HDMI 2.1.',
                'buy'      => 23000000, 'sell' => 27999000, 'stock' => 6, 'min' => 1,
            ],
            [
                'category' => 'TV & Hiburan',
                'sku'      => 'TVH-002-SS',
                'name'     => 'Samsung QN90C 55" Neo QLED 4K Smart TV',
                'desc'     => 'TV Neo QLED 55 inci dengan teknologi Quantum Matrix dan Mini LED, Neural Quantum Processor 4K, motion xcelerator 144Hz, dan Alexa built-in.',
                'buy'      => 14000000, 'sell' => 17499000, 'stock' => 8, 'min' => 2,
            ],
            [
                'category' => 'TV & Hiburan',
                'sku'      => 'TVH-003-XM',
                'name'     => 'Xiaomi TV A2 43" Full HD Smart TV',
                'desc'     => 'Smart TV 43 inci Full HD dengan MIUI for TV, Google Assistant, Chromecast built-in, Dolby Audio, DTS-HD, dan harga terjangkau.',
                'buy'      => 3200000, 'sell' => 3999000, 'stock' => 20, 'min' => 5,
            ],
            [
                'category' => 'TV & Hiburan',
                'sku'      => 'TVH-004-EP',
                'name'     => 'Epson EH-TW7000 4K PRO-UHD Projector',
                'desc'     => 'Proyektor rumah 4K PRO-UHD dengan brightness 3000 lumen, rasio kontras 100000:1, HDR10 support, dan lempar gambar hingga 300 inci.',
                'buy'      => 14000000, 'sell' => 17499000, 'stock' => 5, 'min' => 1,
            ],
            [
                'category' => 'TV & Hiburan',
                'sku'      => 'TVH-005-AP',
                'name'     => 'Apple TV 4K (3rd Gen) WiFi 64GB A15',
                'desc'     => 'Media player streaming Apple dengan chip A15 Bionic, 4K 60fps HDR10/Dolby Vision, AirPlay, HomeKit hub, dan Siri Remote.',
                'buy'      => 2200000, 'sell' => 2799000, 'stock' => 25, 'min' => 6,
            ],

            // ============================================================
            // 14. AKSESORI HP & TABLET
            // ============================================================
            [
                'category' => 'Aksesori HP & Tablet',
                'sku'      => 'AHP-001-SP',
                'name'     => 'Spigen Ultra Hybrid Case iPhone 15 Pro Matte Black',
                'desc'     => 'Soft case premium iPhone 15 Pro dengan bahan TPU + polycarbonate, pelindung kamera raised, pola hexagonal pattern anti-fingerprint.',
                'buy'      => 120000, 'sell' => 159000, 'stock' => 150, 'min' => 40,
            ],
            [
                'category' => 'Aksesori HP & Tablet',
                'sku'      => 'AHP-002-BS',
                'name'     => 'Baseus Magnetic Car Mount MagSafe Wireless Charger',
                'desc'     => 'Car holder + wireless charger MagSafe 15W untuk iPhone, dashboard/kaca depan mount, putar 360°, dan kompatibel dengan casing MagSafe.',
                'buy'      => 280000, 'sell' => 359000, 'stock' => 100, 'min' => 25,
            ],
            [
                'category' => 'Aksesori HP & Tablet',
                'sku'      => 'AHP-003-XM',
                'name'     => 'Xiaomi Wireless Charging Pad Vertical 80W',
                'desc'     => 'Wireless charger stand vertikal 80W untuk Xiaomi & 15W Qi universal, indikator LED, cooling fan internal, dan dukungan MagSafe.',
                'buy'      => 350000, 'sell' => 449000, 'stock' => 70, 'min' => 20,
            ],
            [
                'category' => 'Aksesori HP & Tablet',
                'sku'      => 'AHP-004-PE',
                'name'     => 'Apple Pencil 2nd Generation for iPad Pro',
                'desc'     => 'Stylus premium Apple untuk iPad Pro dengan magnetik attach & wireless charging, latency sangat rendah, dan tilt & pressure sensitivity.',
                'buy'      => 1600000, 'sell' => 1999000, 'stock' => 30, 'min' => 8,
            ],
            [
                'category' => 'Aksesori HP & Tablet',
                'sku'      => 'AHP-005-GA',
                'name'     => 'Gadgetshield Tempered Glass iPhone 15 Pro Max Pack 2',
                'desc'     => 'Pelindung layar tempered glass 9H untuk iPhone 15 Pro Max, bebas gelembung, oleophobic coating, dan auto-align installation kit.',
                'buy'      => 50000, 'sell' => 69000, 'stock' => 300, 'min' => 80,
            ],
            [
                'category' => 'Aksesori HP & Tablet',
                'sku'      => 'AHP-006-XM',
                'name'     => 'Xiaomi Ring Light LED 10 inci Selfie Studio',
                'desc'     => 'Ring light LED 10 inci dengan dudukan tripod 1.8m, 3 mode warna, 11 tingkat kecerahan, sambungan Bluetooth remote, untuk konten kreator.',
                'buy'      => 280000, 'sell' => 359000, 'stock' => 85, 'min' => 20,
            ],

            // ============================================================
            // 15. PERALATAN KANTOR
            // ============================================================
            [
                'category' => 'Peralatan Kantor',
                'sku'      => 'KTR-001-EP',
                'name'     => 'Epson DS-530 Color Document Scanner',
                'desc'     => 'Scanner dokumen ADF 50 lembar kecepatan 35ppm/70ipm, resolusi 600dpi, duplex otomatis, koneksi USB 3.0, dan software Document Capture Pro.',
                'buy'      => 5500000, 'sell' => 6799000, 'stock' => 10, 'min' => 2,
            ],
            [
                'category' => 'Peralatan Kantor',
                'sku'      => 'KTR-002-HN',
                'name'     => 'Honeywell Voyager 1250g 1D Barcode Scanner USB',
                'desc'     => 'Barcode scanner 1D handheld dengan read range 65cm, kecepatan scan 100 scan/detik, kabel USB 1.5m, dan kompatibel semua POS software.',
                'buy'      => 650000, 'sell' => 849000, 'stock' => 25, 'min' => 6,
            ],
            [
                'category' => 'Peralatan Kantor',
                'sku'      => 'KTR-003-ZE',
                'name'     => 'Zebra ZD420 Direct Thermal Label Printer USB BT',
                'desc'     => 'Label printer ZPL/EPL 203dpi untuk label barcode, shipping, dan aset management, dengan USB + Bluetooth, kecepatan 152mm/detik.',
                'buy'      => 2800000, 'sell' => 3499000, 'stock' => 12, 'min' => 3,
            ],
            [
                'category' => 'Peralatan Kantor',
                'sku'      => 'KTR-004-CA',
                'name'     => 'Casio QT-6100 POS Terminal Touch Screen',
                'desc'     => 'Mesin kasir elektronik dengan layar sentuh 10.1 inci, printer thermal built-in, 100.000 PLU, cash drawer port, dan inventory management.',
                'buy'      => 7500000, 'sell' => 9299000, 'stock' => 6, 'min' => 1,
            ],
            [
                'category' => 'Peralatan Kantor',
                'sku'      => 'KTR-005-PR',
                'name'     => 'Projector Screen Manual Pull-Down 100 inch 4:3',
                'desc'     => 'Layar proyektor manual pull-down 100 inci rasio 4:3, kain matte white 1.1 gain, bingkai aluminum, dan bracket dinding mudah dipasang.',
                'buy'      => 650000, 'sell' => 849000, 'stock' => 20, 'min' => 5,
            ],
            [
                'category' => 'Peralatan Kantor',
                'sku'      => 'KTR-006-DE',
                'name'     => 'Deli Heavy Duty Paper Shredder 10 Sheet CD Card',
                'desc'     => 'Mesin penghancur dokumen 10 lembar sekaligus, hancurkan CD/kartu kredit, operasi otomatis sensor, dan laci penampung 15 liter.',
                'buy'      => 950000, 'sell' => 1199000, 'stock' => 15, 'min' => 4,
            ],
        ];

        foreach ($products as $item) {
            $category = $categories->get($item['category']);
            if (!$category) {
                continue; // skip jika kategori tidak ditemukan
            }

            Product::firstOrCreate(
                ['sku' => $item['sku']],
                [
                    'category_id'    => $category->id,
                    'name'           => $item['name'],
                    'description'    => $item['desc'],
                    'purchase_price' => $item['buy'],
                    'selling_price'  => $item['sell'],
                    'stock'          => $item['stock'],
                    'minimum_stock'  => $item['min'],
                ]
            );
        }

        $this->command->info('✅ ' . count($products) . ' produk berhasil di-seed!');
    }
}
