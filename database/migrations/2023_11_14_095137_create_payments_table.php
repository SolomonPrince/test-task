<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('merchant_id')->unsigned()
                ->comment("ID of merchant");;
            $table->foreign('merchant_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('payment_id')->comment('Merchant"s payment ID');
            $table->string('status')->comment('Payment status. Could be new, pending, completed, expired or rejected');
            $table->integer('amount')->comment('Payment amount');
            $table->integer('amount_paid')->comment('Actually paid amount (in merchant"s currency)');
            $table->integer('timestamp')->comment('Current timestamp');
            $table->string('sign')->nullable()->unique()->comment('Signature');
            $table->string('rand')->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
