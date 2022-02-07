<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/condominiums", [condominiumController::class, "list"]);
Route::get("/condominiums/{id}", [condominiumController::class, "detail"]);
Route::post("/condominiums/create", [condominiumController::class, "create"]);
Route::put("/condominiums/edit/{id}", [condominiumController::class, "modify"]);
Route::delete("/condominiums/delete/{id}", [condominiumController::class, "destroy"]);