<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MataPelajaranDiikuti extends Model
{
    use HasFactory;

    protected $table = "mata_pelajaran_diikuti";

    protected $fillable = [
        "name",
        "student_id",
        "mata_kuliah_id",
    ];

    public $timestamps = false;

    /**
     * Get the Student that owns the MataPelajaranDiikuti
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
