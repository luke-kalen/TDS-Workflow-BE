<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('user_id');
            $table->bigInteger('org_id');
            $table->string('contact_name');
            $table->string('url');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('billing_contact');
            $table->string('billing_email')->unique();
            $table->string('billing_address');
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_zip');
            $table->string('billing_phone')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign');
    }
}
