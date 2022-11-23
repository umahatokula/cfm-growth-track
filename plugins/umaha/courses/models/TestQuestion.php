<?php namespace Umaha\Courses\Models;

use Model;
use Umaha\Courses\Models\UsersQuestionAnswer;

/**
 * TestQuestion Model
 */
class TestQuestion extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'umaha_courses_test_questions';

    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [];

    /**
     * @var array rules for validation
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
    protected $jsonable = ['answers'];

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
        'course' => \Umaha\Courses\Models\Course::class
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];


    public static function getCorrectAnswer($questionId) {
        $question = TestQuestion::find($questionId);
        if(!$question) {
          return;
        }

        // get correct answer for question
        $correctAnswer = collect($question->answers)->filter(function($answer) {
          return $answer['is_correct'] == 1;
        });

        return  $correctAnswer ? $correctAnswer->first() : $correctAnswer;
    }

    /**
     * Get the total number of questions in a course
     */
    public static function getTotalNumberOfQuestionsInCourse($courseId) : int {
        return self::where('course_id', $courseId)->count();
    }

    /**
     *
     * Get total number of correctly answered questions for a single course
     */
    public static function getNumberOfCorrectlyAnsweredQuestions($userId, $courseId) : int {

        $responses = UsersQuestionAnswer::where([
            'user_id' => $userId,
            'course_id' => $courseId,
        ])
        ->get();

        return $responses->filter(function($response) {
            return $response->correctly_answered;
        })->count();

    }

    /**
     *
     * Get percentage of correctly answered questions for a single course
     */
    public static function getPercentageScore($userId, $courseId) : float {
        try {
            $result = fdiv(self::getNumberOfCorrectlyAnsweredQuestions($userId, $courseId), self::getTotalNumberOfQuestionsInCourse($courseId));
        } catch (DivisionByZeroError $e) {
            echo 'Message: ' .$e->getMessage();
        }
        return $result;
    }


    public static function getTotalNumberOfQuestionsAnswered($userId, $courseId) {
        return UsersQuestionAnswer::where([
            'user_id' => $userId,
            'course_id' => $courseId,
        ])
        ->count();
    }


    /**
     *
     * Get total number of correctly answered questions for all courses
     * $user_id
     */
    public static function getNumberOfCorrectlyAnsweredQuestionsForAllCourses($userId) : int {

        $courses = Course::all();
        $count=0;
        foreach($courses as $course) {

            $responses = UsersQuestionAnswer::where([
                'user_id' => $userId,
                'course_id' => $course->id,
            ])
            ->get();

            $count += $responses->filter(function($response, $index) use (&$count) {
                return $response->correctly_answered;
            })->count();
        }

        return $count;

    }
}
