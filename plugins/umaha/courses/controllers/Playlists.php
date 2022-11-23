<?php namespace Umaha\Courses\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Umaha\Courses\Models\Playlist;
use Illuminate\Support\Facades\Http;
use Flash;

/**
 * Playlists Back-end Controller
 */
class Playlists extends Controller
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

        BackendMenu::setContext('umaha.Courses', 'courses', 'playlists');
    }

    public function youtube() {

        $config = $this->makeConfig('$/umaha/courses/models/playlist/youtube.yaml');
        $config->model = new Playlist;
        $widget = $this->makeWidget('Backend\Widgets\Form', $config);
        $this->vars['widget'] = $widget;

        $this->initForm($config->model);    }
}
