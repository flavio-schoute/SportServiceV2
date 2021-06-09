<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
	
	
	public $timestamps = false;

	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'providers';
	
	protected $fillable = [
        'name',
        'materials',
		'email'
    ];
}
