<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->comment('نام دسته');
            $table->string('display_name')->nullable()->comment('نام قابل نمایش دسته');
            $table->boolean('enable')->default(1)->comment('فعال یا غیرفعال بودن دسته');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `categories` comment 'جدول دسته های سوال'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('categories');
    }
}
