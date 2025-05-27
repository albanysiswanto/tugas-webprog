<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\JournalEntry;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\JournalEntryController;

Route::get("/", function () {
    return view("welcome");
});

Route::get("/dashboard", function () {
    $user = Auth::user();
    // Mengambil jurnal milik user yang login, diurutkan, dan dipaginasi 10 per halaman
    $journalEntries = JournalEntry::where("user_id", $user->id)
        ->orderBy("entry_date", "desc") // Atau created_at
        ->paginate(10);

    return view("dashboard", [
        "journalEntries" => $journalEntries,
    ]);
})
    ->middleware(["auth", "verified"])
    ->name("dashboard");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit"
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update"
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy"
    );

    Route::resource("journal-entries", JournalEntryController::class);
});

require __DIR__ . "/auth.php";
