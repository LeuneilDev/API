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
        Schema::create('container_tbl', function (Blueprint $table) {
            $table->id();
            $table->text('container_no');
            $table->text('branch_assigned')->nullable();
            $table->integer('capacity')->unsigned()->default(0);
            $table->integer('boxes')->unsigned();
            $table->string('status', 100)->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('container_tbl');
    }
};
