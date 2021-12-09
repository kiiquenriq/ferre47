<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Subcategory;
use App\Http\Livewire\Admin\AtendOrder;
use App\Http\Livewire\Admin\AtendOrderShow;
use App\Http\Livewire\Admin\CrearSub;
use App\Http\Livewire\Admin\CreateBrand;
use App\Http\Livewire\Admin\CreateProducts;
use App\Http\Livewire\Admin\EditCategory;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\OrdenVenta;
use App\Http\Livewire\Admin\OrderDescount;
use App\Http\Livewire\Admin\OrderDetail;
use App\Http\Livewire\Admin\OrderIndex;
use App\Http\Livewire\Admin\OrderPcobrar;
use App\Http\Livewire\Admin\OrderShow;
use App\Http\Livewire\Admin\QtyInventory;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\ShowProducts;
use App\Http\Livewire\Admin\UpdatePrice;
use App\Http\Livewire\Admin\UserCreate;
use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Admin\UsersEdit;
use App\Http\Livewire\Admin\Ventas;
use App\Http\Livewire\Admin\Welcome;

Route::get('register', UserCreate::class)->name('admin.register');

Route::get('products', ShowProducts::class )->name('admin.index');

Route::get('products/{product}/edit', EditProduct::class)->name('admin.products.edit');

Route::get('products/create', CreateProducts::class)->name('admin.products.create');

Route::post('products/{product}/files',[ProductController::class, 'files'])->name('admin.products.files');

Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');

Route::get('subcategories', [SubcategoryController::class, 'index'])->name('admin.subcategories.index');

Route::get('{category}/edit', EditCategory::class)->name('admin.category.edit');

Route::get('subcategory/create', CrearSub::class)->name('admin.subcategory.create');

Route::get('brands/create', CreateBrand::class)->name('admin.brands.create');

// Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
//  Route::get('orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
 Route::get('orders/{order}/show', OrderShow::class)->name('admin.orders.show');

Route::get('orders', OrderIndex::class)->name('admin.orders.index');

//por cobrar
Route::get('orders/detail/{order}', [OrderDetail::class, 'render'])->name('admin.orders.detail');

Route::get('/', Welcome::class)->name('admin.welcome'); //pagina inicio

Route::get('/ventas', Ventas::class)->name('admin.ventas');

Route::get('products/qty-inventory', QtyInventory::class)->name('admin.product.qtyinventory');

Route::get('order-venta', OrdenVenta::class)->name('admin.orden-venta');

Route::get('order/ship', AtendOrder::class)->name('admin.order.ship'); //enviar orden y faltantes
// Route::get('order/ship/{order}', AtendOrderShow::class)->name('admin.order.ship.show'); //enviar orden y faltantes

Route::get('order/descount/{order}', OrderDescount::class)->name('admin.orders.descount');

Route::get('update/price/', UpdatePrice::class)->name('admin.update.price');

Route::get('users', Users::class)->name('admin.users');
Route::get('users/edit/{user}', UsersEdit::class)->name('admin.users.edit');