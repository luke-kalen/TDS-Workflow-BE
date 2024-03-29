<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProofSetsProjectId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proof_sets', function (Blueprint $table) {
            $table->renameColumn('project_id', 'campaign_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proof_sets', function (Blueprint $table) {
            $table->renameColumn('campaign_id', 'project_id');
        });
    }
}
