<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('shipment_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('return_note_id')->constrained()->onDelete('cascade');
            $table->date('shipment_date');
            $table->string('supplier_name');
            $table->string('supplier_address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shipment_records');
    }
}

