<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       	$now = Carbon::now()->toDateTimeString();
        
        App\Group::insert([
        	['title' => 'Кресты'],
        	['title' => 'Кольца'],
        	['title' => 'Образки'],
		]);
        
        App\Product::insert([
            [
                'title' => 'Распятие Христово. Деисус. Вмч. Георгий Победоносец. Нательный крест.',
                'group_id' => 1, 
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'title' => 'Распятие Христово. Молитва кресту. Нательный крест.',
                'group_id' => 2, 
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'title' => 'Золотой крест-подвеска с фианитами',
                'group_id' => 2, 
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'title' => 'Золотой крест-подвеска. Нательный крест.',
                'group_id' => 3, 
                'created_at' => $now, 
                'updated_at' => $now
            ],
        ]);

        App\Attribute::insert([
            ['type' => 'select', 'slug' => 'obraz', 'caption' => 'Святой образ'],
            ['type' => 'multiselect', 'slug' => 'size', 'caption' => 'Размер кольца'],
            ['type' => 'text', 'slug' => 'weight', 'caption' => 'Вес изделия'],
        ]);

        // DB::table('product_attributes')->insert([
        //     ['product_id' => '1', 'attribute_id' => '1', 'value_id' => '1'],
        //     ['product_id' => '1', 'attribute_id' => '2', 'value_id' => '4'],
        //     ['product_id' => '1', 'attribute_id' => '2', 'value_id' => '5'],
        //     ['product_id' => '1', 'attribute_id' => '2', 'value_id' => '6'],
        //     ['product_id' => '1', 'attribute_id' => '2', 'value_id' => '7'],
        //     ['product_id' => '1', 'attribute_id' => '3', 'value_id' => '10'],
        //     ['product_id' => '2', 'attribute_id' => '1', 'value_id' => '3'],
        //     ['product_id' => '2', 'attribute_id' => '2', 'value_id' => '4'],
        //     ['product_id' => '2', 'attribute_id' => '2', 'value_id' => '6'],
        //     ['product_id' => '2', 'attribute_id' => '3', 'value_id' => '11'],
        // ]);

        App\AttributeValue::insert([
            ['attribute_id' => '1', 'value' => 'Архангел Михаил'],
            ['attribute_id' => '1', 'value' => 'Архангел Гавриил'],
            ['attribute_id' => '1', 'value' => 'Святая троица'],
            ['attribute_id' => '2', 'value' => '15'],
            ['attribute_id' => '2', 'value' => '16'],
            ['attribute_id' => '2', 'value' => '17'],
            ['attribute_id' => '2', 'value' => '18'],
            ['attribute_id' => '3', 'value' => '15 грамм'],
            ['attribute_id' => '3', 'value' => '7 грамм'],
            ['attribute_id' => '3', 'value' => '2.6 грамм'],
            ['attribute_id' => '3', 'value' => '55 грамм'],
            ['attribute_id' => '3', 'value' => '156 грамм'],
        ]);     

        DB::table('attribute_value_product')->insert([
            ['product_id' => '1', 'attribute_value_id' => '1'],
            ['product_id' => '1', 'attribute_value_id' => '4'],
            ['product_id' => '1', 'attribute_value_id' => '5'],
            ['product_id' => '1', 'attribute_value_id' => '6'],
            ['product_id' => '1', 'attribute_value_id' => '7'],
            ['product_id' => '1', 'attribute_value_id' => '10'],
            ['product_id' => '2', 'attribute_value_id' => '3'],
            ['product_id' => '2', 'attribute_value_id' => '4'],
            ['product_id' => '2', 'attribute_value_id' => '6'],
            ['product_id' => '2', 'attribute_value_id' => '11'],
        ]);
        
        DB::table('attribute_group')->insert([
            ['group_id' => '1', 'attribute_id' => '1'],
            ['group_id' => '1', 'attribute_id' => '2'],
            ['group_id' => '1', 'attribute_id' => '3'],
            ['group_id' => '2', 'attribute_id' => '1'],
            ['group_id' => '2', 'attribute_id' => '2'],
            ['group_id' => '3', 'attribute_id' => '3'],
        ]);
    }
}
