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
        Schema::create('box_charges_tbl', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination')->constrained('destination_tbl')->onDelete('cascade');
            $table->text('box_type');
            $table->text('box_charge');
            $table->foreignId('branch')->constrained('branch_tbl')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('box_charges_tbl');
    }
};
