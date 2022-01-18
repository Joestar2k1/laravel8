<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportedInvoiceDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'importedInvoiceID',
        'sku',
        'productName',
        'quantity',
        'price',
        'unit',
    ];
}
