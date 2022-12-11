<?php namespace Umaha\Courses\Components;

use Cms\Classes\ComponentBase;
use Rainlab\User\Models\User;
use Umaha\Courses\Models\Center;
use Umaha\Courses\Models\Profile;
use Auth;

/**
 * Profile Component
 */
class EditProfile extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Edit Profile Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun() {
        $user = Auth::getUser();

        if(!$user) {
            return redirect('/login');
        }

        $this->page['centers'] = Center::all();
        $this->page['user'] = $user;
    }

    function onSubmit() {
        // dd(post());

        $profile = Profile::updateOrCreate(
            ['user_id' =>  post('user_id')],
            [
                'fname' => post('fname'),
                'lname' => post('lname'),
                'phone' => post('phone'),
                'city' => post('city'),
                'center_id' => post('center_id'),
                'country_id' => post('country_id'),
                'state_id' => post('state_id'),
            ]
        );


        return redirect('/profile');
    }

}
