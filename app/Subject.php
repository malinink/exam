<?php
/**
 *
 * @author malinink
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'field', 'name', 'complexity',
    ];
}
