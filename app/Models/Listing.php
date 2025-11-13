<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\School;
use App\Models\ListingPhoto;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use SoftDeletes; 
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'description', 'price', 'school_id', 'category_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function photos()
    {
        return $this->hasMany(ListingPhoto::class);
    }

    public function category()
    { 
        return $this->belongsTo(Category::class);
    }


    // Scope for filtering by region/school
    public function scopeFilter($query, array $filters)
    {
        if (!empty($filters['region'])) {
            $query->whereHas('school', function($q) use ($filters) {
                $q->where('region', $filters['region']);
            });
        }

        if (!empty($filters['school'])) {
            $query->where('school_id', $filters['school']);
        }

        if (!empty($filters['category'])) {
            $query->where('category_id', $filters['category']);
        }

        // No need to handle soft deletes manually — Laravel hides them automatically
    }
}
