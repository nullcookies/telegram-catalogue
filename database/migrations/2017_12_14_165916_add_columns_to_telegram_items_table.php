<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToTelegramItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('telegram_items', function (Blueprint $table) {
            $table->string('slug')->nullable()->index()->after('category_id');
            $table->integer('type')->default(1)->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('telegram_items', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('type');
        });
    }
}
