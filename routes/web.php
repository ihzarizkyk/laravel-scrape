<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScrapeController as Scrape;

Route::get('/',[Scrape::class,'scar']);