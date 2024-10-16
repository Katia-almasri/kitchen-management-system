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
        Schema::create(StringConvertorHelper::convertToSnakeSingleName('locations'), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['Active', 'Inactive']);
            $table->text('qr_code'); // temporarily using the qr code without storing the image
            $table->integer('quantity')->default(0);

            $table->unsignedBigInteger('kitchen_id');
            $table->foreign('kitchen_id')->references('id')->on('kitchen')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(StringConvertorHelper::convertToSnakeSingleName('locations'));
    }
};
