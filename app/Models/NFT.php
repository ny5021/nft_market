<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Nft extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'title',
        'artiste',
        'description',
        'adresse',
        'token_standard',
        'price',
        'image',
        'proprietaire_id', // personne ayant payé le nft
        'user_id',  // personne qui crée le nft
        'category_id'
    ];

    /**
     * 
     */
    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->user_id = auth()->user()->id ?? 1;
        });
    }

    /**
     * Get the category of the Nft
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    /**
     * Get the user that create the Nft
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the user that owns the Nft
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'proprietaire_id');
    }
}
