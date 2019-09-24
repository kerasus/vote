<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCategoryAddDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('isDefault')->after('enable')->default(0)->comment('آیا آکاردیون دسته به صورت پیش فرض باز شود یا خیر');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
             if (Schema::hasColumn('categories', 'isDefault')) {
                $table->dropColumn('isDefault');
            }
        });
    }
}
