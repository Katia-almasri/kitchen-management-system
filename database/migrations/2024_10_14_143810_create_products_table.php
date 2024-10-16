<?php

use App\Helper\StringConvertorHelper;
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
        Schema::create(StringConvertorHelper::convertToSnakeSingleName('products'), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('ingredients');

            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('location')->onDelete('cascade');

            $table->unsignedBigInteger('sub_location_id');
            $table->foreign('sub_location_id')->references('id')->on('sub_location')->onDelete('cascade');

            $table->integer('quantity')->default(0);
            $table->integer('alert_quantity')->nullable();
            $table->text('qr_code'); // temporarily using the qr code without storing the image

            $table->enum('status', ['Active', 'Inactive']);

            $table->timestamps();
            $table->timestamp('production_date')->useCurrent();
            $table->timestamp('expiry_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(StringConvertorHelper::convertToSnakeSingleName('products'));
    }
};
