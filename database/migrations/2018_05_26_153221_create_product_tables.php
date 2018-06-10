<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        // Table Products:
        Schema::create('products', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('group_id')->default(1); // Product Group ID
            $table->string('title')->index(); // Required
            // $table->string('longtitle')->default('');
            // $table->text('description')->nullable();
            // $table->text('content')->nullable();
            // $table->string('slug')->default('');
            // $table->string('articul')->default(''); // Articul
            // $table->string('image')->default(''); // Preview
            // $table->string('video')->default(''); // Video YouTube
            // $table->integer('price')->default(0); // Price
            // $table->unsignedInteger('manufacturer_id')->default(0); // Manufacturer
            // $table->boolean('is_main')->default(0); // Show in main page ? 1 : 0
            // $table->boolean('is_blessed')->default(0); // Blessed? 1 : 0
            // $table->boolean('is_hot')->default(0); // Hot sale ? 1 : 0
            // $table->boolean('is_yml')->default(0); // Export to Yandex market ? 1 : 0
            // $table->string('seo_title')->default('');
            // $table->string('seo_description')->default('');
            // $table->string('seo_keywords')->default('');
            $table->boolean('published')->default(1); // Is published
            // $table->integer('rank')->default(0); // Sort rank
            $table->timestamps();
        });


        // Table Attributes:
        Schema::create('features', function(Blueprint $table)
        {
            $table->increments('id'); // Primary Key:
            $table->string('type', 100); // Select, checkbox, text ...
            $table->string('slug', 100)->default(''); // Price, weight, color ...
            $table->string('caption')->default(''); // Caption
            // $table->string('description')->default(''); // Description
            // $table->string('slug', 100)->default(''); // For great URL
            // $table->text('default')->nullable(); // Default attr value
            // $table->integer('rank')->default(0); // Sort rank  
        });


        // Table Product Attributes:
        Schema::create('feature_value_product', function (Blueprint $table) {    
            $table->unsignedInteger('product_id'); 
            $table->unsignedInteger('feature_value_id'); 
        });


        // Table Product Attribute Values:
        Schema::create('feature_values', function (Blueprint $table) {    
            $table->increments('id'); 
            $table->unsignedInteger('feature_id'); 
            $table->text('value')->nullable(); 
        });


        // Table Groups:
        Schema::create('groups', function (Blueprint $table) {    
            $table->increments('id');
            $table->string('title')->default('');
        });


        // Table feature to group:
        Schema::create('feature_group', function (Blueprint $table) {    
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('feature_id');
        });
        
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
        Schema::dropIfExists('products');
        Schema::dropIfExists('features');
        Schema::dropIfExists('feature_value_product');
        Schema::dropIfExists('feature_values');
        Schema::dropIfExists('feature_group');
    }
}
