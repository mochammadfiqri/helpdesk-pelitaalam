<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dataset_tickets', function (Blueprint $table) {
            $table->dropForeign('dataset_tickets_department_id_foreign');
            $table->dropColumn('department_id');
            $table->dropForeign('dataset_tickets_type_id_foreign');
            $table->dropColumn('type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dataset_tickets', function (Blueprint $table) {
            //
        });
    }
};
