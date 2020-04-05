<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUserAddMobileVerifiedAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile_verified_code')->after('mobile')->nullable()->comment('کد احراز هویت موبایل');
            $table->timestamp('mobile_verified_at')->after('mobile_verified_code')->nullable()->comment('تاریخ احراز هویت موبایل');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'mobile_verified_code')) {
                $table->dropColumn('mobile_verified_code');
            }

            if (Schema::hasColumn('users', 'mobile_verified_at')) {
                $table->dropColumn('mobile_verified_at');
            }
        });
    }
}
