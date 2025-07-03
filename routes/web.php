<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ProductManager;

Route::get('/', ProductManager::class)->name('products.index');
