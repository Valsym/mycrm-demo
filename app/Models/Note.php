<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|Feed find($id)
 * @method static \Illuminate\Database\Eloquent\Builder|Feed findOrFail($id)
 */
class Note extends Model
{
    /** @use HasFactory<\Database\Factories\NoteFactory> */
    use HasFactory;

    protected $fillable = ['id', 'deal_id', 'user_id',
        'content', 'created_at'];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function getAttributeLabels()
    {
        return [
            'id' => 'ID',
            'deal_id' => 'Deal ID',
            'dt_add' => 'Dt Add',
            'user_id' => 'User ID',
            'content' => 'Content',
        ];
    }

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
