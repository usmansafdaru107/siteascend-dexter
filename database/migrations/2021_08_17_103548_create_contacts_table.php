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
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->string("first_name");
            $table->string("last_name");
            $table->string("middle_name")->nullable();
            $table->string("salutation")->nullable();
            $table->string("suffix")->nullable();
            $table->string("management_level")->nullable();
            $table->string("department")->nullable();
            $table->string("job_function")->nullable();
            $table->string("job_title")->nullable();
            $table->string("direct_phone_number")->nullable();
            $table->string("dial_extension")->nullable();
            $table->string("mobile_phone")->nullable();
            $table->string("email_address")->nullable();
            $table->string("supplemental_email")->nullable();
            $table->string("aa_email")->nullable();
            $table->string("zoominfo_contact_profile_url")->nullable();
            $table->string("linkedin_contact_profile_url")->nullable();
            $table->string("street")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("zip")->nullable();
            $table->string("country")->nullable();
            $table->string("email_domain")->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
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
