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

        App\Feature::insert([
            ['type' => 'select', 'slug' => 'obraz', 'caption' => 'Святой образ'],
            ['type' => 'multiselect', 'slug' => 'size', 'caption' => 'Размер кольца'],
            ['type' => 'text', 'slug' => 'weight', 'caption' => 'Вес изделия'],
            ['type' => 'textarea', 'slug' => 'description', 'caption' => 'Описание товара'],
            ['type' => 'textarea', 'slug' => 'label', 'caption' => 'Примечание'],
        ]);

        App\FeatureValue::insert([
            ['feature_id' => '1', 'value' => 'Архангел Михаил'],
            ['feature_id' => '1', 'value' => 'Архангел Гавриил'],
            ['feature_id' => '1', 'value' => 'Святая троица'],
            ['feature_id' => '2', 'value' => '15'],
            ['feature_id' => '2', 'value' => '16'],
            ['feature_id' => '2', 'value' => '17'],
            ['feature_id' => '2', 'value' => '18'],
            ['feature_id' => '3', 'value' => '156 грамм'],
            ['feature_id' => '4', 'value' => 'Описание товара. Произвольный текст тут может быть'],
            ['feature_id' => '5', 'value' => 'Примечание, записка пользователя'],
        ]);     

        DB::table('feature_value_product')->insert([
            ['product_id' => '1', 'feature_value_id' => '1'],
            ['product_id' => '1', 'feature_value_id' => '4'],
            ['product_id' => '1', 'feature_value_id' => '5'],
            ['product_id' => '1', 'feature_value_id' => '6'],
            ['product_id' => '1', 'feature_value_id' => '7'],
            ['product_id' => '1', 'feature_value_id' => '8'],

            ['product_id' => '1', 'feature_value_id' => '9'],
            ['product_id' => '1', 'feature_value_id' => '10'],

            ['product_id' => '2', 'feature_value_id' => '3'],
            ['product_id' => '2', 'feature_value_id' => '4'],
            ['product_id' => '2', 'feature_value_id' => '6'],
            ['product_id' => '2', 'feature_value_id' => '9'],
        ]);
        
        DB::table('feature_group')->insert([
            ['group_id' => '1', 'feature_id' => '1'],
            ['group_id' => '1', 'feature_id' => '2'],
            ['group_id' => '1', 'feature_id' => '3'],
            ['group_id' => '1', 'feature_id' => '4'],
            ['group_id' => '1', 'feature_id' => '5'],
            ['group_id' => '2', 'feature_id' => '1'],
            ['group_id' => '2', 'feature_id' => '2'],
            ['group_id' => '3', 'feature_id' => '3'],
        ]);
    }
}
