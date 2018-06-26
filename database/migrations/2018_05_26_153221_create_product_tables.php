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
        
        // Table groups:
        Schema::create('groups', function(Blueprint $table) {    
            $table->increments('id'); 
            $table->string('title')->default('');
        });


        // Table products:
        Schema::create('products', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('group_id')->default(1); 
            $table->string('title')->index(); 
            $table->boolean('published')->default(1); 
            $table->timestamps();

            // Foreign Keys:
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });


        // Table features:
        Schema::create('features', function(Blueprint $table)
        {
            $table->increments('id'); 
            $table->string('type', 100); 
            $table->string('slug', 100)->default(''); 
            $table->string('caption')->default(''); 
        });


        // Table feature to group:
        Schema::create('feature_group', function (Blueprint $table) {    
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('feature_id');

            // Foreign Keys:
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');
        });


        // Table feature values:
        Schema::create('feature_values', function (Blueprint $table) {    
            $table->increments('id'); 
            $table->unsignedInteger('feature_id'); 
            $table->text('value')->nullable();

            // Foreign Keys:
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade'); 
        });


        // Table feature value to product:
        Schema::create('feature_value_product', function (Blueprint $table) {    
            $table->unsignedInteger('product_id'); 
            $table->unsignedInteger('feature_value_id'); 

            // Foreign Keys:
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('feature_value_id')->references('id')->on('feature_values')->onDelete('cascade');
        });
 

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_value_product');
        Schema::dropIfExists('feature_values');
        Schema::dropIfExists('feature_group');
        Schema::dropIfExists('features');
        Schema::dropIfExists('products');
        Schema::dropIfExists('groups'); 
    }
}
