<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->timestamp('checked_in_at');
            $table->timestamp('return_at')->nullable();
            $table->string('last_name');
            // $table->unsignedBigInteger('address_id');
            $table->string('gender');
            $table->unsignedSmallInteger('age');
            $table->string('phone');
            $table->string('email',150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('videoke_id');
            $table->string('usertype', 10)->default('User');
            $table->string('is_paid', 10)->default('Paying');
            $table->string('is_expired', 10)->default('Active');
            $table->string('is_return', 10)->default('Operating');
            $table->timestamps();
            $table->index(['payment_id', 'videoke_id'], 'FK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
