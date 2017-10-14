<?php namespace Jc91715\Sso\Components;

use Cms\Classes\ComponentBase;
use phpCAS;

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
