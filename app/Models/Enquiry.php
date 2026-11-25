<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'name', 'company', 'email', 'phone', 'product_interest',
        'country', 'quantity', 'message', 'status',
    ];

    public function isNew(): bool
    {
        return $this->status === 'new';
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            'read'     => 'Read',
            'replied'  => 'Replied',
            'archived' => 'Archived',
            default    => 'New',
        };
    }
}
