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

        Route::get('/campaign/{campaign}/accordion', [CampaignController::class, 'campaignAccordion'])->name('campaignAccordion');
        Route::post('/campaign/update-status', [CampaignController::class, 'updateStatus'])->name('updateStatus');
        Route::resource('campaign', CampaignController::class)->only([
            'index', 'create', 'store', 'edit', 'update', 'destroy'
        ])->names([
            'index' => 'index', 'create' => 'create', 'store' => 'store', 'edit' => 'edit', 'update' => 'update', 'destroy' => 'destroy'
        ]);

        // Campaign Tags
        Route::post("/campaign-tag/add-status-to-campaign", [CampaignTagController::class, 'addStatusToCampaign'])->name("tag.addStatusToCampaign");
        Route::name('tag.')->group(function() {
            Route::resource('campaign-tag', CampaignTagController::class)->except([
                'show'
            ])->names([
                'index' => 'index', 'create' => 'create', 'store' => 'store', 'edit' => 'edit', 'update' => 'update', 'destroy' => 'destroy'
            ]);
        });
       
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

        // Company Tags
        Route::post("/company-tag/add-status-to-company", [CompanyTagController::class, 'addStatusToCompany'])->name("tag.addStatusToCompany");
        Route::name('tag.')->group(function() {
            Route::resource('company-tag', CompanyTagController::class)->except([
                'show'
            ])->names([
                'index' => 'index', 'create' => 'create', 'store' => 'store', 'edit' => 'edit', 'update' => 'update', 'destroy' => 'destroy'
            ]);
        });

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
            Route::post("/delete", [ContactController::class, "destroy"])->name("destroy");
        });

        Route::resource("contact", ContactController::class)->except([
            'show', 'destroy'
        ])->names([
            'index' => 'index', 'create' => 'create', 'store' => 'store', 'edit' => 'edit', 'update' => 'update'
        ]);

        // Contact Tags
        Route::post("/contact-tag/add-status-to-contact", [ContactTagController::class, 'addStatusToContact'])->name("tag.addStatusToContact");
        Route::name('tag.')->group(function() {
            Route::resource("contact-tag", ContactTagController::class)->except([
                'show'
            ])->names([
                'index' => 'index', 'create' => 'create', 'store' => 'store', 'edit' => 'edit', 'update' => 'update', 'destroy' => 'destroy'
            ]);
        });

    });
   
    // Contact Request
    Route::name("contact-request.")->group(function() {
        Route::resource("contact-request", ContactRequestController::class)->only([
            'index', 'store', 'destroy'
        ])->names([
            'index' => 'index', 'store' => 'requestCreateContact', 'destroy' => 'destroy'
        ]);
    });

    Route::get("/tag/{tag}/contacts", [ContactTagController::class, "tagContacts"])->name("tag.contact");
    Route::get("/tag/{tag}/companies", [CompanyTagController::class, "tagCompanies"])->name("tag.company");
    Route::get("/tag/{tag}/campaigns", [CampaignTagController::class, "tagCampaigns"])->name("tag.campaign");
    
    // Advanced filter
    Route::get("advance/search", [SearchController::class, "index"])->name("advance.search");
});

// User (Demand Generation Representative) Routes
Route::prefix("user")->name("user.")->group(function() {

    Route::get("/dashboard", [DashboardController::class, "userDashboard"])->name("dashboard");

});