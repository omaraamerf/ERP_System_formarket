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
        if (!Schema::hasTable('goods')) {
            Schema::create('goods', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->decimal('price', 8, 2);
                $table->foreignId('supplier_id')->constrained();
                $table->integer('stock_level');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods');
    }
};
