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
        Schema::create('financial_datas', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_salaries', 10, 2)->default(0);
            $table->decimal('total_sales', 10, 2)->default(0);
            $table->decimal('total_due', 10, 2)->default(0);
            $table->date('report_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('financial_datas');
    }

};
