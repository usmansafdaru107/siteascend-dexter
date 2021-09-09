<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
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
            $table->string("clientName");
            $table->string("name");
            $table->string("solution");
            $table->string("solutionURL");
            $table->string("salesRep");
            $table->string("salesRepEmail");
            $table->string("salesRepNumber");
            $table->string("salesRepBridge");
            $table->string("calendarAccess");
            $table->string("calendarUsername");
            $table->string("calendarPassword");
            $table->string("calendarInviteAdmin");
            $table->string("DGRAlias");
            $table->string("CSRAlias");
            $table->string("campaignStartDate");
            $table->string("expectedEndDate");
            $table->string("actualFinishedDate")->nullable();
            $table->text("campaignGoal")->nullable();
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
        Schema::dropIfExists('campaigns');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_campaigns');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'campaigns_companies');
    }
}
