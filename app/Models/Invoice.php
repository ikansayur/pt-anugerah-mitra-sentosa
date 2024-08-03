<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_number', 'date', 'subtotal', 'discount', 'tax', 'total'];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
