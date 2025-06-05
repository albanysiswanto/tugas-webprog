<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import BelongsTo

class JournalEntry extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "journal_entries";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "user_id", // Pastikan user_id bisa diisi secara massal
        "title",
        "content",
        "entry_date",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "entry_date" => "date", // Otomatis cast kolom entry_date ke objek Carbon (date)
        "email_verified_at" => "datetime", // Contoh jika ada, sesuaikan dengan kolommu
    ];

    /**
     * Mendapatkan user yang memiliki entri jurnal ini.
     */
    public function user(): BelongsTo
    {
        // Tentukan tipe kembalian
        // Tentukan tipe kembalian
        return $this->belongsTo(User::class, "user_id"); // 'user_id' adalah foreign key di tabel journal_entries
    }
}
