<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
	
	
	public $timestamps = false;

	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'school';
	
	protected $fillable = [
        'name',
        'email',
		'settlement_location'
    ];
}
