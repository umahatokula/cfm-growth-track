<?php namespace Umaha\Courses\Components;

use Cms\Classes\ComponentBase;
use Umaha\Courses\Models\Profile;
use Auth;
use Flash;

/**
 * ProfileEnforcer Component
 */
class ProfileEnforcer extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'ProfileEnforcer Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'fname' => [
                'title' => 'First Name',
                'default' => 1,
                'type' => 'checkbox',
            ],
            'lname' => [
                'title' => 'Last Name',
                'default' => 1,
                'type' => 'checkbox',
            ],
            'email' => [
                'title' => 'Email',
                'default' => 1,
                'type' => 'checkbox',
            ],
            'phone' => [
                'title' => 'Phone Number',
                'default' => 1,
                'type' => 'checkbox',
            ],
            'country' => [
                'title' => 'Country',
                'default' => 1,
                'type' => 'checkbox',
            ],
            'state' => [
                'title' => 'State',
                'default' => 1,
                'type' => 'checkbox',
            ],
            'center' => [
                'title' => 'Center',
                'default' => 1,
                'type' => 'checkbox',
            ],
        ];
    }

    function onRun() {

        $user = Auth::getUser();
        $profile = Profile::where('user_id', $user->id)->first();

        // redirect only when current page is not edit-profile. This prevent an infinite loop
        $fullPageUrl = $this->currentPageUrl();
        $splitted = explode('/', $fullPageUrl);
        $currentnUrl = end($splitted);

        if (!$profile && $currentnUrl != 'edit-profile') {
            Flash::info("Kindly complete your profile to continue");
            return redirect('edit-profile');
        }


        // $properties = $this->getProperties();

        // foreach ($properties as $property => $value) {
        //    dd($profile);
        // }

    }
}
