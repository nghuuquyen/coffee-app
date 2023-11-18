<?php

namespace App\Models;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function getCheckoutConfirmtionPath(): string
    {
        return URL::signedRoute('checkout.show', ['order' => $this->id]);
    }
}
