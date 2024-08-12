<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orderboxinfo_tbl', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orderinfo_tbl');
            $table->text('container_no')->nullable();
            $table->text('box_type');
            $table->integer('qnty');
            $table->text('box_charge');
            $table->text('box_dimension');
            $table->text('batch_no');
            $table->dateTime('load_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderboxinfo_tbl');
    }
};
