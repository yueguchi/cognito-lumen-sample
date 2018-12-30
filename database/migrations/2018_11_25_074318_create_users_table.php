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
            $table->increments('id');
            $table->string('sub')->unique()->comment('Cognito一意SubCode');
            $table->string('email')->unique()->comment('ログイン用の一意なE-MAILアドレス');
            $table->timestampTz('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日付。デフォルトで現在日時が入る');
            $table->timestampTz('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日付。デフォルトで現在日付が入る');
            $table->timestampTz('deleted_at')->nullable()->comment('削除日付');
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
