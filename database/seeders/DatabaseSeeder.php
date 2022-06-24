<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Foto;
use App\Models\ProdukUmkm;
use App\Models\CategoriProd;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // User::create([
        //     'role' => 'umkm',
        //     'name' => 'aji',
        //     'username' => 'aji',
        //     'password' => bcrypt('aji'),
        //     'email' => 'kartonukik@gmail.com',
        //     'email_verified_at' => '2022-05-23 17:57:38'
        // ]);
        // Foto::create([
        //     'photo_name' => 'test.jpg'
        // ]);

        User::create([
            'role' => 'admin',
            'name' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@gmail.com',
            'telp' => '081234567890',
            'gender' => 'L',
            'address' => 'Surabaya',
            'email_verified_at' => Carbon::now()
        ]);


        // User::create([
        //     'photo_id' => 1,
        //     'role' => 'umkm',
        //     'name' => 'Agus',
        //     'username' => 'agus',
        //     'password' => bcrypt('agus'),
        //     'email' => 'agus@gmail.com',
        //     'telp' => '081234523434',
        //     'gender' => 'L',
        //     'address' => 'Semarang'
        // ]);


        // CategoriProd::create([
        //     'category_name' => 'Rempah-Rempah',
        // ]);

        // CategoriProd::create([
        //     'category_name' => 'Kosmetik',
        // ]);

        // CategoriProd::create([
        //     'category_name' => 'Furniture',
        // ]);

        CategoriProd::create([
            'category_name' => 'Kecantikan',
        ]);

        CategoriProd::create([
            'category_name' => 'Budaya & Kreatif',
        ]);

        CategoriProd::create([
            'category_name' => 'Halal',
        ]);

        CategoriProd::create([
            'category_name' => 'Rempah',
        ]);

        CategoriProd::create([
            'category_name' => 'Perikanan',
        ]);

        CategoriProd::create([
            'category_name' => 'Pertanian',
        ]);

        CategoriProd::create([
            'category_name' => 'Pangan',
        ]);

        CategoriProd::create([
            'category_name' => 'Otomotif',
        ]);

        CategoriProd::create([
            'category_name' => 'Elektronik',
        ]);

        CategoriProd::create([
            'category_name' => 'Makanan Minuman',
        ]);

        CategoriProd::create([
            'category_name' => 'Kebutuhan Rumah Tangga',
        ]);

        // ProdukUmkm::create([
        //     'user_id' => 1,
        //     'category_id' => 1,
        //     'photo_id' => 1,
        //     'prod_name' => 'Cengkeh',
        //     'slug' => 'minyak-cengkeh',
        //     'prod_title' => 'Minyak Cengkeh',
        //     'prod_category' => 'Rempah-Rempah',
        //     'prod_desc' => 'Minyak cengkeh memiliki banyak kasiat yang dapat membantu menjaga kesehatan tubuh. Minyak cengkeh dapat menjaga kesehatan jantung, hati, dan kulit. Minyak cengkeh juga dapat menjaga kesehatan organ lainnya.',
        // ]);

        // ProdukUmkm::create([
        //     'user_id' => 2,
        //     'category_id' => 1,
        //     'photo_id' => 1,
        //     'prod_name' => 'Biji Pala',
        //     'prod_category' => 'Rempah-Rempah',
        //     'slug' => 'biji-pala',
        //     'prod_title' => 'Biji Pala',
        //     'prod_desc' => 'Terdapat kandungan zat antiseptik di dalam biji pala, namun tidak hanya itu saja, biji pala juga memiliki kandungan antibakteri, anti peradangan dan luka, antioksidan serta analgesik',
        // ]);
      
        // ProdukUmkm::create([
        //     'user_id' => 3,
        //     'category_id' => 2,
        //     'photo_id' => 1,
        //     'prod_name' => 'Kopi',
        //     'prod_category' => 'Rempah-Rempah',
        //     'slug' => 'kopi-robusta',
        //     'prod_title' => 'Kopi Robusta',
        //     'prod_desc' => 'Kopi Robusta (nama Latin Coffea canephora atau Coffea robusta) merupakan keturunan beberapa spesies kopi, terutama Coffea canephora',
        // ]);

    }
}
