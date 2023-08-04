<?php

namespace App\Models;

use Database\Factories\NotebookFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static findOrFail($id)
 */
class Notebook extends Model
{
    protected $fillable = [
        'full_name',
        'company',
        'phone',
        'email',
        'birth_date',
        'photo'
    ];

    public static function factory(): NotebookFactory
    {
        return NotebookFactory::new();
    }

}
