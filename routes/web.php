<?php


use Illuminate\Support\Facades\Route;

Route::get('leads', [\Osoobe\CRM\Http\Controllers\LeadController::class, 'index'])->name('lead.index');

?>
