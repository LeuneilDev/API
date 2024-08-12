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
        Schema::create('orderinfo_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no', 100)->unique()->nullable();
            $table->text('agent_code')->nullable();
            $table->text('sender_name');
            $table->text('sender_address');
            $table->text('sender_contact');
            $table->text('sender_email');
            $table->text('receiver_name');
            $table->text('receiver_address');
            $table->text('receiver_contact');
            $table->text('receiver_email');
            $table->text('destination');
            $table->text('request_status');
            $table->dateTime('request_info_at')->nullable();
            $table->text('order_status')->nullable();
            $table->dateTime('order_status_at')->nullable();
            $table->text('declared_value');
            $table->decimal('total_value', 10, 2);
            $table->decimal('total_payment', 10, 2);
            $table->text('payment_method');
            $table->integer('branch_assigned');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderinfo_tbl');
    }
};
