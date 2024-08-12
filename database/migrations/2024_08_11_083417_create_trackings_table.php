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
        Schema::create('tracking_tbl', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orderinfo_tbl')->onDelete('cascade');
            $table->string('invoice_no');
            $table->foreign('invoice_no')->references('invoice_no')->on('orderinfo_tbl')->onDelete('cascade');
            $table->string('container_no')->nullable()->default('N/A');
            $table->string('location');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tracking_tbl', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['invoice_no']);
        });
        Schema::dropIfExists('tracking_tbl');
    }
};
