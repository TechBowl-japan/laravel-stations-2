<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('date')->comment('日付');
            $table->foreignId('schedule_id')->constrained()->comment('スケジュールID');
            $table->foreignId('sheet_id')->constrained()->comment('シートID');
            $table->string('email', 255)->comment('予約者メールアドレス');
            $table->string('name', 50)->comment('予約者名');
            $table->boolean('is_canceled')->default(false)->comment('予約キャンセル済み');
            $table->timestamps();

            $table->unique(['schedule_id', 'sheet_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['schedule_id', 'sheet_id']);
            $table->dropUnique(['schedule_id', 'sheet_id']);
        });
        Schema::dropIfExists('reservations');
    }
}
