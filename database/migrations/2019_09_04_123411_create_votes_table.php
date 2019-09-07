<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner_id')->nullable()->comment('آی دی کاربر ایجاد کننده سوال');
            $table->unsignedBigInteger('category_id')->nullable()->comment('دسته سوال');
            $table->string('subject')->nullable()->comment('صورت سوال');
            $table->boolean('enable')->default(1)->comment('فعال یا غیرفعال بودن سوال');
            $table->timestamp('valid_since')->nullable()->comment('تاریخ شروع نظرسنجی');
            $table->timestamp('valid_until')->nullable()->comment('تاریخ پایان نظرسنجی');
            $table->integer('tmp_count')->default(0)->comment('تعداد کل دفعات شرکت کردن در این سوال');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onupdate('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onupdate('cascade');

        });
        DB::statement("ALTER TABLE `votes` comment 'جدول سوال ها'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
