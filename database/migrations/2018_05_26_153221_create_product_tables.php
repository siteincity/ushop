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
        Schema::create('attributes', function(Blueprint $table)
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
        Schema::create('product_attributes', function (Blueprint $table) {    
            $table->increments('id'); // Primary Key:
            $table->unsignedInteger('product_id');  // Product 
            $table->unsignedInteger('attribute_id'); // Attribute
            $table->text('value')->nullable(); // Value
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('product_attributes');
    }
}
