<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public int $id;
    public string $name;
    public int $phone_mobile;
    public int $phone_home;
}
