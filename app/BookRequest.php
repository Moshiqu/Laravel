<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
  protected $fillable = [
    'name',
    'phone',
    'email',
    'item_name',
    'pickup_date',
  ];
}