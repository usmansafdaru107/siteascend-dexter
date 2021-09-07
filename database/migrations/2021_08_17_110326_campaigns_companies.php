<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CampaignsCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns_companies', function(Blueprint $table){
            $table->id();
            $table->foreignId('campaign_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('status_id')->nullable()->default('1');
            $table->foreign('status_id')->references('id')->on('campaign_company_statuses')->onUpdate('cascade')->onDelete('cascade');
            // $table->string('status')->default('active');
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
        Schema::dropIfExists('campaigns_companies');
    }
}
