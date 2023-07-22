<?php namespace Umaha\Courses;

use Backend;
use System\Classes\PluginBase;
use RainLab\User\Models\UserGroup;
use Event;
use Auth;
use Umaha\Courses\Models\UnlockedModule;
use Umaha\Courses\Models\Course;
use Rainlab\User\Models\User;

use Mail;

/**
 * Courses Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * @var array Plugin dependencies
     */
    public $require = ['Rainlab.User', 'Responsiv.Currency'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Courses',
            'description' => 'No description provided yet...',
            'author'      => 'Umaha',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

        UserGroup::extend(function($model) {
            $model->belongsToMany['playlists'] = [
                'Umaha\Courses\Models\Playlist',
                'table' => 'umaha_courses_group_playlist',
                'key'      => 'group_id',
                'otherKey' => 'playlist_id',
            ];

            $model->belongsToMany['courses'] = [
                'Umaha\Courses\Models\Course',
                'table' => 'umaha_courses_course_group',
                'key'      => 'group_id',
                'otherKey' => 'course_id',
            ];
        });

        \Event::listen('offline.sitesearch.query', function ($query) {

            // The controller is used to generate page URLs.
            $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();

            // Search your plugin's contents
            $items = [];

            // Now build a results array
            $results = $items->map(function ($item) use ($query, $controller) {

                // If the query is found in the title, set a relevance of 2
                $relevance = mb_stripos($item->name, $query) !== false ? 2 : 1;

                return [
                    'title'     => $item->name,
                    'text'      => $item->description,
                    'url'       => $controller->pageUrl('products', ['slug' => $item->slug]),
                    'relevance' => $relevance, // higher relevance results in a higher
                ];
            });

            return [
                'provider' => 'Document', // The badge to display for this result
                'results'  => $results,
            ];
        });

        \Event::listen('umaha.courses.courseUnlocked', function($passedCourseId) {
            $user = Auth::getUser();

            $dependantCourse = Course::where('prerequisite', $passedCourseId)->first();

            if (!$dependantCourse) return;

            UnlockedModule::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'course_id' => $dependantCourse->id,
                ]
            );
        });

        Event::listen('umaha.courses.coursePassed', function ($passedCourseId, $user) {

            Event::fire('umaha.courses.courseUnlocked', [$passedCourseId]);

            $course = Course::find($passedCourseId);
            if(!$course->email_template_code) return;

            // Send mail
            if ($user->email) {
                $vars = ['user' => $user];

                Mail::queue($course->email_template_code, $vars, function($message) use ($user) {

                    $message->to($user->email, $user->name);

                });
            }

        });

        User::extend(function($model) {
            $model->hasOne['profile'] = [
                \Umaha\Courses\Models\Profile::class, 'key' => 'user_id'
            ];
        });

        \Event::listen('umaha.courses.userRegistered', function($user) {
            // dd($user);

            // Send mail
            if ($user['email']) {
                $vars = ['user' => $user];

                Mail::queue('umaha.courses.userRegistered', $vars, function($message) use ($user) {

                    $message->to($user['email'], $user['name']);

                });
            }
        });


    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Umaha\Courses\Components\Videos'         => 'videos',
            'Umaha\Courses\Components\PlaylistLists'  => 'playlistLists',
            'Umaha\Courses\Components\PlaylistVideos' => 'playlistVideos',
            'Umaha\Courses\Components\Course'         => 'course',
            'Umaha\Courses\Components\CourseDetails'  => 'courseDetails',
            'Umaha\Courses\Components\TestQuestions'  => 'testQuestions',
            'Umaha\Courses\Components\QuizResult'     => 'quizResult',
            'Umaha\Courses\Components\EditProfile'    => 'editProfile',
            'Umaha\Courses\Components\ProfileEnforcer' => 'profileEnforcer',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'umaha.courses.courses' => [
                'tab' => 'Courses',
                'label' => 'Manage courses',
                'roles' => ['developer']
            ],
            'umaha.courses.videos' => [
                'tab' => 'Courses',
                'label' => 'Manage Videos',
                'roles' => ['developer']
            ],
            'umaha.courses.playlists' => [
                'tab' => 'Courses',
                'label' => 'Manage Playlists',
                'roles' => ['developer']
            ],
            'umaha.courses.audios' => [
                'tab' => 'Courses',
                'label' => 'Manage Audios',
                'roles' => ['developer']
            ],
            'umaha.courses.documents' => [
                'tab' => 'Courses',
                'label' => 'Manage Documents',
                'roles' => ['developer']
            ],
            'umaha.courses.categories' => [
                'tab' => 'Courses',
                'label' => 'Manage Categories',
                'roles' => ['developer']
            ],
            'umaha.courses.quiz' => [
                'tab' => 'Courses',
                'label' => 'Manage Quizes',
                'roles' => ['developer']
            ],
            'umaha.courses.centers' => [
                'tab' => 'Courses',
                'label' => 'Manage Centers',
                'roles' => ['developer']
            ],
            'umaha.courses.users' => [
                'tab' => 'Courses',
                'label' => 'Manage Students',
                'roles' => ['developer', 'publisher']
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'courses' => [
                'label'       => 'Courses',
                'url'         => Backend::url('umaha/courses/courses'),
                'icon'        => 'icon-graduation-cap',
                'permissions' => ['umaha.courses.*'],
                'order'       => 500,
                'sideMenu'    => [
                    'courses' => [
                        'label'       => 'Courses',
                        'url'         => Backend::url('umaha/courses/courses'),
                        'icon'        => 'icon-graduation-cap',
                        'permissions' => ['umaha.courses.*'],
                        'order'       => 500,
                    ],
                    'videos' => [
                        'label'       => 'Videos',
                        'url'         => Backend::url('umaha/courses/videos'),
                        'icon'        => 'icon-film',
                        'permissions' => ['umaha.courses.*'],
                        'order'       => 500,
                    ],
                    'playlists' => [
                        'label'       => 'Playlists',
                        'url'         => Backend::url('umaha/courses/playlists'),
                        'icon'        => 'icon-bars',
                        'permissions' => ['umaha.courses.*'],
                        'order'       => 500,
                    ],
                    'audios' => [
                        'label'       => 'Audios',
                        'url'         => Backend::url('umaha/courses/audios'),
                        'icon'        => 'icon-bullhorn',
                        'permissions' => ['umaha.courses.*'],
                        'order'       => 500,
                    ],
                    'documents' => [
                        'label'       => 'Documents',
                        'url'         => Backend::url('umaha/courses/documents'),
                        'icon'        => 'icon-file-pdf-o',
                        'permissions' => ['umaha.courses.*'],
                        'order'       => 500,
                    ],
                    'categories' => [
                        'label'       => 'Categories',
                        'url'         => Backend::url('umaha/courses/categories'),
                        'icon'        => 'icon-bars',
                        'permissions' => ['umaha.courses.*'],
                        'order'       => 500,
                    ],
                    'quiz' => [
                        'label'       => 'Quiz',
                        'url'         => Backend::url('umaha/courses/testquestions'),
                        'icon'        => 'icon-bars',
                        'permissions' => ['umaha.courses.*'],
                        'order'       => 500,
                    ],
                    'centers' => [
                        'label'       => 'Centers',
                        'url'         => Backend::url('umaha/courses/centers'),
                        'icon'        => 'icon-bars',
                        'permissions' => ['umaha.courses.*'],
                        'order'       => 500,
                    ],
                    'users' => [
                        'label'       => 'Users',
                        'url'         => Backend::url('umaha/courses/users'),
                        'icon'        => 'icon-bars',
                        'permissions' => ['umaha.courses.*'],
                        'order'       => 500,
                    ],
                ]
            ],
        ];
    }

    public function registerReportWidgets()
    {
        return [
            \Umaha\Courses\ReportWidgets\ProgressReports::class => [
                'label' => 'Growth Track Progress',
                'context' => 'dashboard',
                'permissions' => [
                    'rainlab.googleanalytics.widgets.traffic_overview',
                ],
            ],
        ];
    }

}
