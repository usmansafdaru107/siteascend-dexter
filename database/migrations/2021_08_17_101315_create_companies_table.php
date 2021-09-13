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
            $table->string("website")->nullable();
            $table->string("street_address")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("zip")->nullable();
            $table->string("country")->nullable();
            $table->string("hq_phone")->nullable();
            $table->string("ticker")->nullable();
            $table->string("revenue")->nullable();
            $table->string("revenue_range")->nullable();
            $table->string("marketing_dept_budget")->nullable();
            $table->string("finance_dept_budget")->nullable();
            $table->string("it_dept_budget")->nullable();
            $table->string("hr_dept_budget")->nullable();
            $table->string("employees")->nullable();
            $table->string("employees_range")->nullable();
            $table->string("primary_industry")->nullable();
            $table->string("primary_sub_industry")->nullable();
            $table->string("all_industries")->nullable();
            $table->string("all_sub_industries")->nullable();
            $table->string("zoominfo_company_profile_url")->nullable();
            $table->string("linkedin_company_profile_url")->nullable();
            $table->string("ownership_type")->nullable();
            $table->string("business_model")->nullable();
            $table->string("to_dial_extension")->nullable();
            $table->string("to_dial_directory")->nullable();
            $table->string("to_dial_operator")->nullable();
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

}
