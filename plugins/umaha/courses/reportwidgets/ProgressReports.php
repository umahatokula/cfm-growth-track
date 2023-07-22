<?php namespace Umaha\Courses\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use Exception;
use RainLab\User\Models\User;
use Umaha\Courses\Models\Course;
use Umaha\Courses\Models\UnlockedModule;
use Umaha\Courses\Models\TestQuestion;

/**
 * ProgressReports Report Widget
 */
class ProgressReports extends ReportWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'ProgressReportsReportWidget';

    /**
     * defineProperties for the widget
     */
    public function defineProperties()
    {
        return [
            'title' => [
                'title' => 'backend::lang.dashboard.widget_title_label',
                'default' => 'Progress Reports Report Widget',
                'type' => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'backend::lang.dashboard.widget_title_error',
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        try {
            $this->prepareVars();
        }
        catch (Exception $ex) {
            $this->vars['error'] = $ex->getMessage();
        }

        return $this->makePartial('progressreports');
    }

    /**
     * Prepares the report widget view data
     */
    public function prepareVars() {

        $users = User::all();
        $courses = Course::all();
        $allUnlockedCourses = UnlockedModule::all();

        $reports = [];
        foreach ($users as $user) {

            $unlockedCourses = $allUnlockedCourses->where('user_id', $user->id)->pluck('course_id')->all();

            foreach ($courses as $course) {

                if(in_array($course->id, $unlockedCourses)) {
                    $c[$course->name] = TestQuestion::getPercentageScore($user->id, $course->id); 
                } else {
                    $c[$course->name] = 'Locked'; 
                }            

            }
            $reports[] = [
                'user' => $user,
                'courses' => $c,
            ];
        }
        // dd($reports);
        $this->vars['reports'] = $reports;
        $this->vars['courses'] = Course::all();
    }

    /**
     * @inheritDoc
     */
    protected function loadAssets() {
    }

}
