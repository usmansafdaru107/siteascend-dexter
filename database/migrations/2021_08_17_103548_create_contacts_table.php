<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->string("first_name");
            $table->string("last_name");
            $table->string("middle_name");
            $table->string("salutation");
            $table->string("suffix");
            $table->string("management_level");
            $table->string("department");
            $table->string("job_function");
            $table->string("job_title");
            $table->string("direct_phone_number");
            $table->string("mobile_phone");
            $table->string("email_address");
            $table->string("supplemental_email");
            $table->string("zoominfo_contact_profile_url");
            $table->string("linkedin_contact_profile_url");
            $table->string("street");
            $table->string("city");
            $table->string("state");
            $table->string("zip");
            $table->string("country");
            $table->string("email_domain");
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
        Schema::dropIfExists('contacts');
    }
}
