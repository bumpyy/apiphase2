<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        "name",
        "email",
        "password",
    ];

    public $timestamps = false;

    /**
     * Get all of the mataPelajaranDiikuti for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mataPelajaranDiikuti(): HasMany
    {
        return $this->hasMany(MataPelajaranDiikuti::class);
    }
}
