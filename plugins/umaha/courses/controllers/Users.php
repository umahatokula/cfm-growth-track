<?php namespace Umaha\Courses\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

use Exception;
use RainLab\User\Models\User;
use Umaha\Courses\Models\Course;
use Umaha\Courses\Models\UnlockedModule;
use Umaha\Courses\Models\TestQuestion;
use Umaha\Courses\Models\Profile;

/**
 * Users Backend Controller
 */
class Users extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Umaha.Courses', 'courses', 'users');
    }

    public function onShowUserDetails() {
        $userProfileId = post('record_id');

        $userProfile = Profile::find($userProfileId);
        $courses = Course::all();
        $allUnlockedCourses = UnlockedModule::all();
        $unlockedCourses = $allUnlockedCourses->where('user_id', $userProfile->user_id)->all();

        foreach ($courses as $course) {

            $startedOn = null; 

            if(in_array($course->id, collect($unlockedCourses)->pluck('course_id')->all())) {

                $score = TestQuestion::getPercentageScore($userProfile->user_id, $course->id);
                $startedOn = collect($unlockedCourses)->filter(function ($value, $key) use($course) {
                    return $value->course_id == $course->id;
                })->first();

            } else {
                $score = 'Locked'; 
            }            

            $reports[] = [
                'score'     => $score,
                'startedOn' => $startedOn,
                'course'    => $course
            ];
        }

        $this->vars['reports'] = $reports;
        $this->vars['userProfile'] = $userProfile;

        return $this->makePartial('details');
    }
}
