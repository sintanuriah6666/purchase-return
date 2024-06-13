<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnNotesTable extends Migration
{
    public function up()
    {
        Schema::create('return_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('damaged_product_id')->constrained()->onDelete('cascade');
            $table->string('note_number');
            $table->date('purchase_date');
            $table->string('customer_name');
            $table->string('customer_phone_number');
            $table->decimal('price', 10, 2);
            $table->decimal('total', 10, 2);
            $table->enum('status', ['pending', 'shipped']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('return_notes');
    }
}
