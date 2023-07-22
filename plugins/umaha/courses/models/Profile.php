<?php namespace Umaha\Courses\Models;

use Model;

/**
 * Profile Model
 */
class Profile extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'umaha_courses_profiles';

    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = ['user_id', 'fname', 'lname', 'phone', 'center_id', 'city', 'country_id', 'state_id'];

    /**
     * @var array rules for validation
     */
    public $rules = [
        'fname'         => 'required',
        'lname'         => 'required',
        'phone'         => 'required',
        // 'city'          => 'required',
        'country_id'    => 'required',
        'state_id'      => 'required',
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
    protected $jsonable = [];

    /**
     * @var array appends attributes to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array hidden attributes removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array dates attributes that should be mutated to dates
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array hasOne and other relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'user' => \RainLab\User\Models\User::class,
        'center' => \Umaha\Courses\Models\Center::class,
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public $implement = ['RainLab.Location.Behaviors.LocationModel'];
}
