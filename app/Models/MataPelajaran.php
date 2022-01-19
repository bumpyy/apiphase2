<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = "mata_pelajaran";

    protected $fillable = [
        "name",
    ];

    public $timestamps = false;

    /**
     * The mataPelajaranDiikuti that belong to the MataPelajaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mataPelajaranDiikuti(): BelongsToMany
    {
        return $this->belongsToMany(MataPelajaran::class);
    }

}
