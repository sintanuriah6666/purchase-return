<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDamagedProductsTable extends Migration
{
    public function up()
    {
        Schema::create('damaged_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_code'); 
            $table->integer('quantity');
            
            $table->text('note')->nullable();
            $table->timestamps();
        
            $table->foreign('product_code')->references('product_code')->on('products')->onDelete('cascade');
        });
        
    }
        
    public function down()
    {
        Schema::dropIfExists('damaged_products');
    }
}
