<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name', 'content', 'rating', 'status', 'reviewed_at', 'reviewed_by'];

    protected $casts = [
        'reviewed_at' => 'datetime',
    ];

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function approve($adminId)
    {
        $this->update([
            'status' => 'approved',
            'reviewed_at' => now(),
            'reviewed_by' => $adminId
        ]);
    }

    public function reject($adminId)
    {
        $this->update([
            'status' => 'rejected',
            'reviewed_at' => now(),
            'reviewed_by' => $adminId
        ]);
    }
}
