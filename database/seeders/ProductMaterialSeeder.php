<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //  Mahsulotlar
        $t_shirt = Product::firstOrCreate([
            'product_name' => 'ko\'ylak',
            'product_code' => 20,
        ]);
        
        $trouser = Product::firstOrCreate([
            'product_name' => 'shim',
            'product_code' => 25,
        ]);


        //  Materialllar
        $ip = Material::firstOrCreate([
            'material_name' => 'ip',
        ]);

        $mato = Material::firstOrCreate([
            'material_name' => 'mato',
        ]);

        $tugma = Material::firstOrCreate([
            'material_name' => 'tugma',
        ]);

        $zamok = Material::firstOrCreate([
            'material_name' => 'zamok',
        ]);


        //  Mahsulot uchun kerakli materiallar
        $materials = [
            [
                'product_id' => $t_shirt->id,
                'material_id' => $ip->id,
                'quantity' => 10,
            ],
            [
                'product_id' => $t_shirt->id,
                'material_id' => $mato->id,
                'quantity' => 2,
            ],
            [
                'product_id' => $t_shirt->id,
                'material_id' => $tugma->id,
                'quantity' => 5,
            ],
            [
                'product_id' => $trouser->id,
                'material_id' => $ip->id,
                'quantity' => 15,
            ],
            [
                'product_id' => $trouser->id,
                'material_id' => $mato->id,
                'quantity' => 3,
            ],
            [
                'product_id' => $trouser->id,
                'material_id' => $zamok->id,
                'quantity' => 1,
            ],
        ];
        DB::table('product_materials')->insert($materials);


        // Omborxona
        $warehouses = [ 
            [
                'material_id' => $mato->id,
                'remainder' => 12,
                'price' => 1500,
            ], 
            [
                'material_id' => $mato->id,
                'remainder' => 200,
                'price' => 1600,
            ], 
            [
                'material_id' => $ip->id,
                'remainder' => 40,
                'price' => 500,
            ],
            [
                'material_id' => $ip->id,
                'remainder' => 300,
                'price' => 550,
            ],
            [
                'material_id' => $tugma->id,
                'remainder' => 500,
                'price' => 300,
            ],
            [
                'material_id' => $zamok->id,
                'remainder' => 1000,
                'price' => 2000,
            ]
        ];
        DB::table('warehouses')->insert($warehouses);
        
    }
}
