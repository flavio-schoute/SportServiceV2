<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class School extends Model
{
    use HasFactory;

    protected $primaryKey = 'school_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
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

	public function students() {
	    return $this->hasMany(Student::class, 'student_id', 'school_id');
    }
}
