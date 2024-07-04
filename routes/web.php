<?php

use App\Http\Controllers\LaptopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::get('/laptop', function () {
    return view('laptop');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/scanner', function () {
    return view('scanner');
})->name('scanner');

Route::get('/laptop', [LaptopController::class, 'index'])->name('laptop');
Route::get('/laptops/csv-all', [LaptopController::class, 'generateCSV']);
Route::get('/laptops/pdf', [LaptopController::class, 'pdf']);
Route::post('/laptops/import', [LaptopController::class, 'importCsv'])->name('laptop.import');
Route::post('/import-csv', [LaptopController::class, 'importCsv'])->name('import.csv');
Route::get('/laptops/export-excel', [LaptopController::class, 'exportExcel'])->name('laptops.exportExcel');