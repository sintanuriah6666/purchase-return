<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   
     public function up()
     {
         Schema::table('damaged_products', function (Blueprint $table) {
             $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
         });
     }
 
     public function down()
     {
         Schema::table('damaged_products', function (Blueprint $table) {
             $table->dropForeign(['supplier_id']);
             $table->dropColumn('supplier_id');
         });
     }
};
