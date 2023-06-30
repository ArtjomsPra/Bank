<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\Currency;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'to_account_id',
        'from_user_id',
        'to_user_id',
        'amount',
        'currency',
        'transaction_type',
        'additional_info'
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
}
