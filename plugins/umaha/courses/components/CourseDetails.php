<?php namespace Umaha\Courses\Components;

use Cms\Classes\ComponentBase;
use Umaha\Courses\Models\Course as CourseModel;
use Umaha\Courses\Models\UnlockedModule;
use Auth;

class CourseDetails extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Single Course',
            'description' => 'Displays a single course'
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                 'title'             => 'Course Slug',
                 'description'       => 'Course Slug',
                 'type'              => 'string',
                 'required'          => 'true',
            ],
        ];
    }

    public function onRun() {

        if(!Auth::getUser()) {
            return redirect('/login');
        }

        $slug = $this->property('slug');

        $course = CourseModel::where('slug', $slug)
        ->with(['playlists.videos' => function ($query) {
            $query->orderBy('track_number');
        }])->orderBy('sequence_number')
        ->first();

        $this->page['course'] = $course;

        // if this course has no prerequisite, add it as an unlocked course for this user
        if(!$this->prerequisite) {

            UnlockedModule::updateOrCreate(
                [
                    'user_id' => Auth::getUser()->id,
                    'course_id' => $course->id,
                ]
            );
        }

    }
}
