<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            ['name' => 'Smartphone & Tablet', 'description' => 'Perangkat komunikasi mobile seperti smartphone, tablet, dan aksesori terkait.'],
            ['name' => 'Laptop & Komputer', 'description' => 'Komputer jinjing, desktop, dan komponen komputer untuk kebutuhan profesional maupun personal.'],
            ['name' => 'Monitor & Display', 'description' => 'Monitor komputer, layar LED/LCD, dan perangkat display untuk produktivitas dan gaming.'],
            ['name' => 'Komponen PC', 'description' => 'Processor, motherboard, RAM, storage, VGA card, dan komponen rakitan PC lainnya.'],
            ['name' => 'Jaringan & Konektivitas', 'description' => 'Router, switch, kabel jaringan, access point, dan perangkat networking lainnya.'],
            ['name' => 'Penyimpanan Data', 'description' => 'Hard drive, SSD, flash drive, memory card, dan solusi penyimpanan eksternal.'],
            ['name' => 'Audio & Speaker', 'description' => 'Headphone, earphone, speaker, amplifier, dan perangkat audio berkualitas tinggi.'],
            ['name' => 'Kamera & Fotografi', 'description' => 'Kamera DSLR, mirrorless, action camera, lensa, tripod, dan aksesori fotografi.'],
            ['name' => 'Periferal Komputer', 'description' => 'Keyboard, mouse, webcam, printer, scanner, dan periferal pendukung komputer.'],
            ['name' => 'Gaming', 'description' => 'Konsol game, controller, gaming headset, mouse gaming, dan aksesori gaming.'],
            ['name' => 'Smart Home & IoT', 'description' => 'Perangkat rumah pintar, smart speaker, IoT sensor, dan sistem otomasi rumah.'],
            ['name' => 'Power & Baterai', 'description' => 'Powerbank, charger, UPS, baterai, dan solusi daya untuk perangkat elektronik.'],
            ['name' => 'TV & Hiburan', 'description' => 'Televisi, proyektor, media player, decoder, dan perangkat hiburan rumah.'],
            ['name' => 'Aksesori HP & Tablet', 'description' => 'Casing, pelindung layar, charger, holder, dan berbagai aksesori untuk smartphone dan tablet.'],
            ['name' => 'Peralatan Kantor', 'description' => 'Mesin fotokopi, label printer, barcode scanner, dan peralatan kantor berbasis teknologi.'],
        ];

        $item = $this->faker->unique()->randomElement($categories);

        return [
            'name'        => $item['name'],
            'description' => $item['description'],
        ];
    }
}
