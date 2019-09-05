<?php

use Illuminate\Support\Facades\DB;
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
            $table->integer('foreign_id')->nullable()->comment('آی دی کاربر در سایت خارجی');
            $table->string('first_name')->nullable()->comment('نام کوچک');
            $table->string('last_name')->nullable()->comment('نام خانوادگی');
            $table->string('mobile')->nullable()->comment('شماره موبایل کاربر');
            $table->string('email')->nullable()->unique()->comment('آدرس ایمیل');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            DB::statement("ALTER TABLE `users` comment 'جدول کاربران'");
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
