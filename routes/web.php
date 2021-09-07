<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CampaignCompanyStatusController;
use App\Http\Controllers\ContactTagController;
use App\Http\Controllers\CompanyTagController;
use App\Http\Controllers\CampaignTagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, "index"])->name('home')->middleware(["auth", "ensureProperRedirectToDashboard"]);

Route::get('/login', [AuthController::class, "index"])->name('login');
Route::post('/login', [AuthController::class, "login"]);
Route::post('/logout', [AuthController::class, "logout"])->name('logout');

// Admin Routes
Route::prefix("admin")->name("admin.")->middleware(["auth", "admin"])->group(function() {

    Route::get("/dashboard", [DashboardController::class, "adminDashboard"])->name("dashboard");

    // User
    Route::get("/user", [UserController::class, "index"])->name("user.index");
    Route::get("/user/create", [UserController::class, "create"])->name("user.create");
    Route::post("/user", [UserController::class, "store"])->name("user.store");
    Route::get("/user/{user}/edit", [UserController::class, "edit"])->name("user.edit");
    Route::put("/user/{user}", [UserController::class, "update"])->name("user.update");
    Route::delete("/user/{user}", [UserController::class, "destroy"])->name("user.destroy");

    // Campaign
    Route::get("/campaign", [CampaignController::class, "index"])->name("campaign.index");
    Route::get("/campaign/create", [CampaignController::class, "create"])->name("campaign.create");
    Route::post("/campaign", [CampaignController::class, "store"])->name("campaign.store");
    Route::get("/campaign/{campaign}/edit", [CampaignController::class, "edit"])->name("campaign.edit");
    Route::put("/campaign/{campaign}", [CampaignController::class, "update"])->name("campaign.update");
    Route::delete("/campaign/{campaign}", [CampaignController::class, "destroy"])->name("campaign.destroy");

    Route::get("/campaign/{campaign}/companies", [CampaignController::class, "companyCampaigns"])->name("campaign.company");
    Route::post('/campaign/updateStatus', [CampaignController::class, 'updateStatus'])->name('campaign.updateStatus');
    
    // Company Campaign Statuses
    Route::get('/campaign/company/status/fetchAll', [CampaignCompanyStatusController::class, 'index'])->name('campaignCompanyStatuses.fetchAll');


    // Company
    Route::get("/company", [CompanyController::class, "index"])->name("company.index");
    Route::get("/company/create", [CompanyController::class, "create"])->name("company.create");
    Route::post("/company", [CompanyController::class, "store"])->name("company.store");
    Route::get("/company/{company}/edit", [CompanyController::class, "edit"])->name("company.edit");
    Route::put("/company/{company}", [CompanyController::class, "update"])->name("company.update");
    Route::delete("/company/{company}", [CompanyController::class, "destroy"])->name("company.destroy");
    Route::get("/company/upload", [CompanyController::class, "bulkUpload"])->name("company.bulkUpload");
    Route::post("/company/upload", [CompanyController::class, "upload"])->name("company.upload");
    Route::get("/company/accord", [CompanyController::class, "accordview"])->name("company.accordview");

    // Contact
    Route::get("/contact", [ContactController::class, "index"])->name("contact.index");
    Route::get("/contact/create", [ContactController::class, "create"])->name("contact.create");
    Route::post("/contact", [ContactController::class, "store"])->name("contact.store");
    Route::get("/contact/{contact}/edit", [ContactController::class, "edit"])->name("contact.edit");
    Route::put("/contact/{contact}", [ContactController::class, "update"])->name("contact.update");
    Route::delete("/contact/{contact}", [ContactController::class, "destroy"])->name("contact.destroy");
    Route::get("/contact/upload", [ContactController::class, "bulkUpload"])->name("contact.bulkUpload");
    Route::post("/contact/upload", [ContactController::class, "upload"])->name("contact.upload");

    // Contact Tags
    Route::get("/contact/tag", [ContactTagController::class, "index"])->name("contact.tag.index");
    Route::get("/contact/tag/create", [ContactTagController::class, "create"])->name("contact.tag.create");
    Route::post("/contact/tag", [ContactTagController::class, "store"])->name("contact.tag.store");
    Route::get("/contact/tag/{tag}/edit", [ContactTagController::class, "edit"])->name("contact.tag.edit");
    Route::put("/contact/tag/{tag}", [ContactTagController::class, "update"])->name("contact.tag.update");
    Route::delete("/contact/tag/{tag}", [ContactTagController::class, "destroy"])->name("contact.tag.destroy");
    Route::post("/contact/tag/addStatusToContact", [ContactTagController::class, 'addStatusToContact'])->name("contact.tag.addStatusToContact");

    Route::get("/tag/{tag}/contacts", [ContactTagController::class, "tagContacts"])->name("tag.contact");

    // Company Tags
    Route::get("/company/tag", [CompanyTagController::class, "index"])->name("company.tag.index");
    Route::get("/company/tag/create", [CompanyTagController::class, "create"])->name("company.tag.create");
    Route::post("/company/tag", [CompanyTagController::class, "store"])->name("company.tag.store");
    Route::get("/company/tag/{tag}/edit", [CompanyTagController::class, "edit"])->name("company.tag.edit");
    Route::put("/company/tag/{tag}", [CompanyTagController::class, "update"])->name("company.tag.update");
    Route::delete("/company/tag/{tag}", [CompanyTagController::class, "destroy"])->name("company.tag.destroy");
    Route::post("/company/tag/addStatusToCompany", [CompanyTagController::class, 'addStatusToCompany'])->name("company.tag.addStatusToCompany");
    
    Route::get("/tag/{tag}/companies", [CompanyTagController::class, "tagCompanies"])->name("tag.company");

    // Campaign Tags
    Route::get("/campaign/tag", [CampaignTagController::class, "index"])->name("campaign.tag.index");
    Route::get("/campaign/tag/create", [CampaignTagController::class, "create"])->name("campaign.tag.create");
    Route::post("/campaign/tag", [CampaignTagController::class, "store"])->name("campaign.tag.store");
    Route::get("/campaign/tag/{tag}/edit", [CampaignTagController::class, "edit"])->name("campaign.tag.edit");
    Route::put("/campaign/tag/{tag}", [CampaignTagController::class, "update"])->name("campaign.tag.update");
    Route::delete("/campaign/tag/{tag}", [CampaignTagController::class, "destroy"])->name("campaign.tag.destroy");
    Route::post("/campaign/tag/addStatusToCampaign", [CampaignTagController::class, 'addStatusToCampaign'])->name("campaign.tag.addStatusToCampaign");
    
    Route::get("/tag/{tag}/campaigns", [CampaignTagController::class, "tagCampaigns"])->name("tag.campaign");
    
});

// User (Demand Generation Representative) Routes
Route::prefix("user")->name("user.")->group(function() {

    Route::get("/dashboard", [DashboardController::class, "userDashboard"])->name("dashboard");

});