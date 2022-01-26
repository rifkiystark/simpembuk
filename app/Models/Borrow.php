<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->hasOne(Book::class, "book_code", "book_code");
    }

    public function student()
    {
        return $this->hasOne(Student::class, "id", "student_id");
    }
}
