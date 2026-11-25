<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name'        => 'Smartphone & Tablet',
                'description' => 'Perangkat komunikasi mobile seperti smartphone, tablet, dan aksesori terkait. Mencakup berbagai merek ternama dari kelas entry-level hingga flagship.',
            ],
            [
                'name'        => 'Laptop & Komputer',
                'description' => 'Komputer jinjing, desktop, all-in-one, dan workstation untuk kebutuhan profesional, pelajar, maupun gaming.',
            ],
            [
                'name'        => 'Monitor & Display',
                'description' => 'Monitor komputer, layar LED/LCD, curved display, dan perangkat display untuk produktivitas tinggi dan pengalaman gaming imersif.',
            ],
            [
                'name'        => 'Komponen PC',
                'description' => 'Processor, motherboard, RAM, kartu grafis (VGA), casing, power supply, dan komponen rakitan PC untuk para builder.',
            ],
            [
                'name'        => 'Jaringan & Konektivitas',
                'description' => 'Router, switch, kabel jaringan, access point, modem, dan perangkat networking untuk kebutuhan rumah maupun bisnis.',
            ],
            [
                'name'        => 'Penyimpanan Data',
                'description' => 'Hard drive internal/eksternal, SSD, flash drive USB, memory card, dan solusi penyimpanan cloud storage lokal.',
            ],
            [
                'name'        => 'Audio & Speaker',
                'description' => 'Headphone, earphone, TWS earbuds, speaker bluetooth, soundbar, amplifier, dan perangkat audio berkualitas tinggi.',
            ],
            [
                'name'        => 'Kamera & Fotografi',
                'description' => 'Kamera DSLR, mirrorless, action camera, lensa kamera, tripod, drone kamera, dan aksesori fotografi profesional.',
            ],
            [
                'name'        => 'Periferal Komputer',
                'description' => 'Keyboard, mouse, webcam, printer, scanner, graphics tablet, dan periferal pendukung komputer untuk meningkatkan produktivitas.',
            ],
            [
                'name'        => 'Gaming',
                'description' => 'Konsol game PlayStation, Xbox, Nintendo, controller, gaming headset, mouse gaming, dan aksesori gaming lainnya.',
            ],
            [
                'name'        => 'Smart Home & IoT',
                'description' => 'Perangkat rumah pintar, smart speaker, IoT sensor suhu & kelembaban, kamera CCTV, smart lock, dan sistem otomasi rumah.',
            ],
            [
                'name'        => 'Power & Baterai',
                'description' => 'Powerbank, charger fast charging, UPS, stabilizer listrik, baterai, dan solusi daya untuk perangkat elektronik.',
            ],
            [
                'name'        => 'TV & Hiburan',
                'description' => 'Televisi LED/OLED, smart TV, proyektor, media player, decoder, dan perangkat hiburan rumah.',
            ],
            [
                'name'        => 'Aksesori HP & Tablet',
                'description' => 'Casing ponsel, pelindung layar, charger, holder, selfie stick, dan berbagai aksesori untuk smartphone dan tablet.',
            ],
            [
                'name'        => 'Peralatan Kantor',
                'description' => 'Mesin fotokopi, label printer, barcode scanner, mesin kasir (POS), dan peralatan kantor berbasis teknologi.',
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                ['description' => $category['description']]
            );
        }
    }
}
