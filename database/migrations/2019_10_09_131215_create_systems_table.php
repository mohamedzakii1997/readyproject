<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255);
            $table->string('customer_name',255);
            $table->string('modality',255);
            $table->string('version',255);
            $table->string('country',255);
            $table->string('contcat_person',255);
            $table->string('hmme_sales_person',255);
            $table->integer('po_no');
            $table->date('shipping_date');
            $table->date('installtion_date');
            $table->string('system_preferences',255);
            $table->string('install_options',255);
            $table->date('warrantly_start_date');
            $table->date('warrantly_end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systems');
    }
}
