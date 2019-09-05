<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vote_id')->comment('آی دی سوال نظرسنجی که دارای این گزینه است');
            $table->string('title')->nullable()->comment('عنوان گزینه');
            $table->boolean('enable')->default(1)->comment('فعال یا غیر فعال بودن گزینه');
            $table->integer('tmp_count')->default(0)->comment('تعداد دفعات امتخاب شدن این گزینه');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('vote_id')
                ->references('id')
                ->on('votes')
                ->onDelete('cascade')
                ->onupdate('cascade');
        });
        DB::statement("ALTER TABLE `options` comment 'جدول گزینه های سوال'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
