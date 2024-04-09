<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stock_id')->unique()->default($this->generateUniqueStockId());
            $table->string('status');
            $table->string('chassis_no');
            $table->string('model_grade');
            $table->string('slug');
            $table->string('engine_type')->nullable();
            $table->string('drive')->nullable();
            $table->integer('body_type')->nullable();
            $table->string('transmission')->nullable();
            $table->string('condition')->nullable();
            $table->string('color')->nullable();
            $table->date('year_month')->nullable();
            $table->integer('doors')->nullable();
            $table->decimal('m3', 10, 3)->nullable();
            $table->integer('seats')->nullable();
            $table->decimal('fob_price', 10, 2);
            $table->boolean('show_cnf_price')->default(false);
            $table->string('fuel')->nullable();
            $table->float('mileage')->nullable();
            $table->float('cc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }

    /**
     * Generate a unique random 10-digit number.
     */
    private function generateUniqueStockId()
    {
        return mt_rand(1000000000, 9999999999);
    }
};
