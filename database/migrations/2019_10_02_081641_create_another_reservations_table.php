<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnotherReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('another_reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('videoke_id');
            $table->unsignedBigInteger('payment_id');
            $table->timestamp('reserved_at')->nullable();
            $table->string('qr_password', 60);
            $table->string('is_paid', 20)->default('Paying');
            $table->string('is_return', 10)->default('Operating');
            $table->timestamp('qrcode_issued_at')->nullable();
            $table->timestamp('videoke_return_issued_at')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'payment_id', 'videoke_id'], 'FK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('another_reservations');
    }
}
