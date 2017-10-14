<?php namespace Jc91715\Sso\Components;

use Cms\Classes\ComponentBase;
use phpCAS;
use RainLab\User\Models\User;
use Auth;

class Sso extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'sso Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->initCAS();
        phpCAS::forceAuthentication();
        $userId = phpCAS::getUser();
        var_dump($userId);

        $user=User::where('name',$userId)->first();
        $password = strtolower(Str::quickRandom(8));
        if(!$user){
            $user     = Auth::register(
                [
                    'name'                  => post('real_name'),
                    'email'                 => post('email'),
                    'phone'                 => post('phone'),
                    'password'              => $password,
                    'password_confirmation' => $password,
                ],
                true
            );
        }

        $userLogin=Auth::login($user, true);

        var_dump($userLogin);

    }

    protected function initCAS()
    {
        $config = config('services.cas');
        phpCAS::setDebug();
        phpCAS::setVerbose(true);
        phpCAS::client(CAS_VERSION_2_0, $config['host'], $config['port'], $config['context']);
        phpCAS::setNoCasServerValidation();
    }
}
