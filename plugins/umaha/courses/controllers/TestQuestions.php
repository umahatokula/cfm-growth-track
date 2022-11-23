<?php namespace Umaha\Courses\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Test Questions Backend Controller
 */
class TestQuestions extends Controller
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

        BackendMenu::setContext('Umaha.Courses', 'courses', 'testquestions');
    }
}
