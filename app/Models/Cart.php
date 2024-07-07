<?php
// app/Models/Cart.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'bookid', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'bookid');
    }
}
