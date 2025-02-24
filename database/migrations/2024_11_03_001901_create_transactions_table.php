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
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('type_id')->constrained('transaction_types');
        $table->string('description');
        $table->decimal('amount', 10, 2);
        $table->date('transaction_date');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
