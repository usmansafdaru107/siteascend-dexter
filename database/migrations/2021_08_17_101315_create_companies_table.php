<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("street_address");
            $table->string("city");
            $table->string("state");
            $table->string("zip");
            $table->string("country");
            $table->string("hq_phone");
            $table->string("ticker");
            $table->string("revenue");
            $table->string("revenue_range");
            $table->string("marketing_dept_budget");
            $table->string("finance_dept_budget");
            $table->string("it_dept_budget");
            $table->string("hr_dept_budget");
            $table->string("employees");
            $table->string("employees_range");
            $table->string("primary_industry");
            $table->string("primary_sub_industry");
            $table->string("all_industries");
            $table->string("all_sub_industries");
            $table->string("zoominfo_company_profile_url");
            $table->string("linkedin_company_profile_url");
            $table->string("ownership_type");
            $table->string("business_model");
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
        Schema::dropIfExists('companies');
    }

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaigns_companies');
    }
}
