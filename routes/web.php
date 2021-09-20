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
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, "index"])->name('home')->middleware(["auth", "ensureProperRedirectToDashboard"]);

Route::get('/login', [AuthController::class, "index"])->name('login');
Route::post('/login', [AuthController::class, "login"]);
Route::post('/logout', [AuthController::class, "logout"])->name('logout');

// Admin Routes
Route::prefix("admin")->name("admin.")->middleware(["auth", "admin"])->group(function() {

    Route::get("/dashboard", [DashboardController::class, "adminDashboard"])->name("dashboard");

    // User
    Route::name("user.")->group(function(){
        Route::resource('user', UserController::class)->only([
            'index', 'create', 'store', 'edit', 'update', 'destroy'
        ])->names([
            'index' => 'index', 'create' => 'create', 'store' => 'store', 'edit' => 'edit', 'update' => 'update','destroy' => 'destroy'
        ]);
    });

    // Campaign
    Route::name("campaign.")->group(function() {
        Route::resource('campaign', CampaignController::class)->only([
            'index', 'create', 'store', 'edit', 'update', 'destroy'
        ])->names([
            'index' => 'index', 'create' => 'create', 'store' => 'store', 'edit' => 'edit', 'update' => 'update', 'destroy' => 'destroy'
        ]);
        Route::get('/campaign/{campaign}/accordion', [CampaignController::class, 'campaignAccordion'])->name('campaignAccordion');
        Route::post('/campaign/update-status', [CampaignController::class, 'updateStatus'])->name('updateStatus');
    });
    
    // Company Campaign Statuses
    Route::get('/campaign-company-status/index', [CampaignCompanyStatusController::class, 'index'])->name('campaignCompanyStatuses.index');

    // Company
    Route::name("company.")->group(function() {
        Route::prefix("company")->group(function() {
            Route::get("/accord", [CompanyController::class, "accordview"])->name("accordview");
            Route::post("/mini-update/{company}", [CompanyController::class, "miniUpdate"])->name("miniUpdate");
            Route::get("/csv/upload", [CompanyController::class, "csvUpload"])->name("bulkUpload");
            Route::post("/csv/upload", [CompanyController::class, "upload"])->name("upload");
            Route::post("/mini-update-note", [CompanyController::class, "miniUpdateNote"])->name("miniUpdateNote");
        });

        Route::resource('company', CompanyController::class)->names([
            'index' => 'index', 'create' => 'create', 'store' => 'store', 'show' => 'fetchOne', 'edit' => 'edit', 'update' => 'update', 'destroy' => 'destroy'
        ]);
    });

    // Contact
    Route::name("contact.")->group(function() {
        Route::prefix("contact")->group(function() {
            Route::post("/fetch-one", [ContactController::class, "show"])->name("fetchOne");
            Route::get("/delete-requests", [ContactController::class, "deleteRequests"])->name("delete.requests");
            Route::post("/restore/{contact}", [ContactController::class, "restore"])->name("restore");
            Route::post("/mini-update/{contact}", [ContactController::class, "miniUpdate"])->name("miniUpdate");
            Route::post("/mini-update-note", [ContactController::class, "miniUpdateNote"])->name("miniUpdateNote");
            Route::delete("/force-destroy/{contact}", [ContactController::class, "forceDestroy"])->name("force.destroy");
            Route::get("/csv/upload", [ContactController::class, "bulkUpload"])->name("bulkUpload");
            Route::post("/csv/upload", [ContactController::class, "upload"])->name("upload");
            Route::post("/store-mini", [ContactController::class, "storeMini"])->name("storeMini");
            Route::post("/store-mini-contact", [ContactController::class, "storeMiniContact"])->name("storeMiniContact");
        });
        Route::resource("contact", ContactController::class)->except([
            'show'
        ])->names([
            'index' => 'index', 'create' => 'create', 'store' => 'store', 'edit' => 'edit', 'update' => 'update', 'destroy' => 'destroy'
        ]);
    });
   
    // Contact Request
    Route::name("contact-request.")->group(function() {
        Route::resource("contact-request", ContactRequestController::class)->only([
            'index', 'store', 'destroy'
        ])->names([
            'index' => 'index', 'store' => 'requestCreateContact', 'destroy' => 'destroy'
        ]);
        // Route::get("/", [ContactRequestController::class, "index"])->name("index");
        // Route::post("/", [ContactRequestController::class, "store"])->name("requestCreateContact");
    });
    
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
    
    // Advanced filter
    Route::get("advance/search", [SearchController::class, "index"])->name("advance.search");
});

// User (Demand Generation Representative) Routes
Route::prefix("user")->name("user.")->group(function() {

    Route::get("/dashboard", [DashboardController::class, "userDashboard"])->name("dashboard");

});