<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
			$table->string('last_name');
			$table->string('mobile')->unique();
			$table->string('email')->unique();
            $table->string('username')->unique();
			$table->string('photo_profile')->nullable();
			$table->string('password');
            $table->enum('status',['yes', 'no'])->default('yes');
			$table->rememberToken();
			$table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
