<?php

Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');

Route::post('/permissions/store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store');

Route::get('/permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit');

Route::delete('/permissions/{permission}/delete', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permission.destroy');

Route::put('/permissions/{permission}/update', [App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');

Route::put('/permissions/{permission}/attach', [App\Http\Controllers\PermissionController::class, 'attach_role'])->name('permission.role.attach');

Route::put('/permissions/{permission}/detach', [App\Http\Controllers\PermissionController::class, 'detach_role'])->name('permission.role.detach');