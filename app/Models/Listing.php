<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;


    /**
     * You need to create this fillable variable to tell laravel which fields in the
     * table can be fillable because by default none of them are.
     *
     * You can also go into AppServiceProvider.php and inside the boot method add Model::unguard()
     */
    // protected $fillable = [
    //     'title',
    //     'company',
    //     'location',
    //     'website',
    //     'email',
    //     'description',
    //     'tags',
    // ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship To User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
