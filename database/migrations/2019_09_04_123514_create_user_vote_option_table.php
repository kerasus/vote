<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVoteOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vote_option', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('آی دی کاربر نظر دهنده');
            $table->unsignedBigInteger('vote_id')->comment('آی دی سوال نظرسنجی');
            $table->unsignedBigInteger('option_id')->comment('آی ئی گزینه انتخاب شده');
            $table->timestamps();
            $table->softDeletes();
            $table->unique([
                'user_id',
                'vote_id',
                'option_id',
            ]);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onupdate('cascade');

            $table->foreign('vote_id')
                ->references('id')
                ->on('votes')
                ->onDelete('cascade')
                ->onupdate('cascade');

            $table->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onDelete('cascade')
                ->onupdate('cascade');

        });
        DB::statement("ALTER TABLE `user_vote_option` comment 'جدول گزینه های انتخاب شده کاربران'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_vote_option');
    }
}
