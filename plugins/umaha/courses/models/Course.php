<?php namespace Umaha\Courses\Models;

use Model;
use Str;
use Responsiv\Currency\Models\Currency as CurrencyModel;
use Auth;

/**
 * Course Model
 */
class Course extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'umaha_courses_courses';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'name' => 'required',
        'slug' => 'required',
        // 'code' => 'required',
        'sequence_number' => 'required',
        // 'groups' => 'required',
        // 'course_image' => 'required',
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = ['things_to_be_learnt'];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = ['unlocked'];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'questions' => \Umaha\Courses\Models\TestQuestion::class
    ];
    public $belongsTo = [];
    public $belongsToMany = [
        'videos' => [
            'Umaha\Courses\Models\Video',
            'table' => 'umaha_courses_course_video',
            'key'      => 'course_id',
            'otherKey' => 'video_id'
        ],
        'playlists' => [
            'Umaha\Courses\Models\Playlist',
            'table' => 'umaha_courses_course_playlist',
            'key'      => 'course_id',
            'otherKey' => 'playlist_id'
        ],
        'groups' => [
            'RainLab\User\Models\UserGroup',
            'table' => 'umaha_courses_course_group',
            'key'      => 'course_id',
            'otherKey' => 'group_id',
        ],
        'audios' => [
            'Umaha\Courses\Models\Audio',
            'table' => 'umaha_courses_audio_course',
            'key'      => 'course_id',
            'otherKey' => 'audio_id'
        ],
        'documents' => [
            'Umaha\Courses\Models\Document',
            'table' => 'umaha_courses_course_document',
            'key'      => 'course_id',
            'otherKey' => 'document_id'
        ],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'course_image' => 'System\Models\File'
    ];
    public $attachMany = [];

    /**
     * Determine if the user is an administrator.
     *
     * @return bool
     */
    public function getUnlockedAttribute()
    {
        return $this->prerequisite == 0 || UnlockedModule::isUnlocked(Auth::getUser()->id, $this->id);
    }

    public function getPlaylistIdOptions() {
        return Playlist::pluck('name', 'id');
    }

	public function getCurrencyOptions(){
		return CurrencyModel::isEnabled()->lists('currency_code','currency_code');
	}

	public function getPrerequisiteOptions(){
        $noOption = [0 => 'No Pre-requisite'];
		return $noOption + $this->pluck('name', 'id')->toArray();
	}

    public static function getNextCourse($courseId) {
        return Course::where('prerequisite', $courseId)->first();
    }

    public static function coursePassed($searchParam) : bool {
        $user = Auth::getUser();
        if(!$user) {
            return false;
        }

        $course = self::where('id', $searchParam)->orWhere('slug', $searchParam)->first();

        $percentageScore = TestQuestion::getPercentageScore($user->id, $course->id);

        return $percentageScore >= $course->pass_mark;

    }
}
