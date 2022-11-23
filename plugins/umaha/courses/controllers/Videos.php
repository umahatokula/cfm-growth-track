<?php namespace Umaha\Courses\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Umaha\Courses\Models\Video;
use Illuminate\Support\Facades\Http;
use Flash;

/**
 * Videos Back-end Controller
 */
class Videos extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('umaha.Courses', 'courses', 'videos');
    }

    public function create() {

        $config = $this->makeConfig('$/umaha/courses/models/video/fields.yaml');
        $config->model = new Video;
        $widget = $this->makeWidget('Backend\Widgets\Form', $config);
        $this->vars['widget'] = $widget;

        $this->asExtension('FormController')->create();
    }

    public function formBeforeSave($model) {

        // get video ID
        $youtube_video_id = post('Video[youtube_video_id]');

        // form URL
        $url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id='.$youtube_video_id.'&part=contentDetails&key='.env('YOUTUBE_API_KEY');

        // call YouTube API
        $response = Http::get($url);

        // persist to DB
        if(empty($response->object()->items)) {

            $model->youtube_video_id = null;
            $model->duration = null;
            $model->thumbnail = null;

        }else {

            $duration = $response->object()->items[0]->contentDetails->duration;

            $duration = \substr($duration, 2);

            // get minutes
            if(\strpos($duration, 'M')) {
                $minutes = explode('M', $duration)[0];
            } else {
                $minutes = 0;
            }

            // get seconds
            if(\strpos($duration, 'M')) { // if duration contains minutes

                $m_exploded = explode('M', $duration);

                if(\strpos($m_exploded[1], 'S')) {
                    $s_exploded = explode('S', $m_exploded[1]);
                    $seconds = $s_exploded[0];
                }

            }
            elseif(\strpos($duration, 'S')) { // if duration contains seconds

                $s_exploded = explode('S', $duration);
                $seconds = $s_exploded[0];

            }
            else {
                $seconds = 0;
            }

            $model->duration = $minutes.'m '.$seconds.'s';
            $model->thumbnail = $response->object()->items[0]?->snippet?->thumbnails?->default->url;

        }

    }
}
