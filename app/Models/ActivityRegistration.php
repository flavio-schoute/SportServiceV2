<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ActivityRegistration extends Model
{
    use HasFactory;

    //Todo: remove line 12 and 13 if array fillable is filled with the columns.
    protected $guarded = [];

    /**
     * Define the rigth database table for this model.
     *
     * @var string
     */
    protected $table = 'activity_registration';


    // Todo: Fill in the fillable.
    /**
     * The columns that can be filled.
     *
     * @var array
     */
    protected $fillable = [];


    public function activityOffer(): HasOne
    {
        //dit not test it. Use HasOne or BelongsTo. But i think its not needed.

        // Also you can make a model for sports and add there a function with a hasMany relation.
        // if you use that you can do like this ActivityRegistration::find(1)->activityOffer->sports;
        // but because i dont have made that model i did it with an leftJoin on the hasOne, see below (line 42).
        return $this->hasOne('activity_offer', 'uni_activity_name', 'uni_activity_name')
            ->leftJoin('sports', 'activity_offer.id_sport', '=', 'sports.sport_id');
    }

    /*
     * Example function for sports.
     * This function, you need to put in the Model Sport if you made that model.
     * Command to make that model: ``php artisan make:model Sport``
     * also make sure you do the same as in this model. that you set the protected $table variable to the
     * table name in the database then and also make sure you remove leftJoin in function activityOffer here above
     * and replace it with '->with('sports');'
     */
//    public function sports(): HasMany
//    {
//        /**
//         * first parameter (related) is the related database table or ModelName::class where you relating to.
//         * second parameter (foreignKey) is the column to reference to in other table.
//         * third parameter (localKey) is the column where you reference from. In this table.
//         */
//        return $this->hasMany('sports', 'sport_id', 'id_sport');
//    }
}
