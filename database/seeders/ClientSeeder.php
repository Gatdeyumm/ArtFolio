<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Client::factory(30)->create();

        $client = [
            [
                'title' => 'Chasing You',
                'description' => 'Chasing You" portrays the exhilarating pursuit of an unattainable connection, where passion and longing intertwine on the canvas.',
                'artist' => 'Secret Kim',
                'email' => 'kimsecret627@gmail.com',
                'price' => 50000,
            ],
            [
                'title' => 'Bursting Bliss',
                'description' => '"A vibrant and exuberant artwork radiating joy and positivity, capturing the essence of a joyful person.',
                'artist' => 'Princess Ella',
                'email' => 'ellalibariosconstantino@gmail.com',
                'price' => 100000,
            ],
            [
                'title' => 'The Last Meet',
                'description' => '"The Last Meet" captures the bittersweet essence of a farewell, freezing the emotions of that final encounter in a timeless and poignant display of artistry.',
                'artist' => 'Bree Smith',
                'email' => 'breesmith279@gmail.com',
                'price' => 300000,
            ],
            [
                'title' => 'The Memory of Us',
                'description' => '"The Memory of Us" tenderly preserves the cherished moments of a past shared, immortalizing the essence of love and togetherness through strokes of nostalgic beauty.',
                'artist' => 'Joy Lauros',
                'email' => 'joylauros5@gmail.com',
                'price' => 300000,
            ],
            [
                'title' => 'Enchanted',
                'description' => '"Enchanted" weaves a mesmerizing tale of magic and wonder, inviting viewers into a world of enchantment and fascination, where imagination knows no bounds.',
                'artist' => 'Ley Smith',
                'email' => 'leysmith793@gmail.com',
                'price' => 20000,
            ],
            [
                'title' => 'Symphony of the Soul',
                'description' => '"Symphony of the Soul" orchestrates a harmonious blend of emotions, weaving an exquisite melody that resonates deep within the heart, evoking feelings of profound introspection and connection.',
                'artist' => 'Apple Caminos',
                'email' => 'applegwaps23@gmail.com',
                'price' => 20000,
            ],
            [
                'title' => 'Serenade of Colors',
                'description' => '"Serenade of Colors" is an evocative and enchanting artwork title that suggests a vibrant and melodious interplay of various hues, painting a picture of a harmonious and captivating visual symphony.',
                'artist' => 'Kristine Marie',
                'email' => 'dupakristin96@gmail.com',
                'price' => 30000,
            ],
            [
                'title' => 'Dancing Shadows',
                'description' => '"Dancing Shadow" invokes a mesmerizing portrayal of ethereal movement and elusive grace, where shadows come to life and waltz in an enchanting performance, blurring the lines between reality and imagination.',
                'artist' => 'Aparicio D.',
                'email' => 'aparicio.enice1402@gmail.com',
                'price' => 20000,
            ],
            [
                'title' => 'Midnight Mirage',
                'description' => '"Midnight Mirage" conjures an enigmatic and surreal vision, where the darkness of the night conceals illusions that play tricks on the senses, inviting viewers into a dreamlike realm of mystery and allure.',
                'artist' => 'AjV',
                'email' => 'acejoygwapo123@gmail.com',
                'price' => 20000,
            ],
            [
                'title' => 'Infinite Serenity',
                'description' => '"Infinite Serenity" portrays a vast, serene landscape that evokes a profound sense of peace and unity with nature.',
                'artist' => 'Franzsaijem',
                'email' => 'mejiasfranzsaijem@gmail.com',
                'price' => 20000,
            ],
        ];

        foreach($client as $c) {
            Client::create($c);
        }
    }
}