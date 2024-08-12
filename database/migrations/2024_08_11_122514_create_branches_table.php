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
        Schema::create('branch_tbl', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('branch_id')->nullable();
            $table->text('branch_name');
            $table->text('branch_code');
            $table->text('owner');
            $table->text('contact');
            $table->text('address');
            $table->text('email');
            $table->text('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_tbl');
    }
};
