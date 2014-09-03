<?php namespace Iceflow;

use Illuminate\Support\ServiceProvider;

class IceflowServiceProvider extends ServiceProvider
{
    public function register()
    {
//        $listeners = $this->app['config']->get('iceflow.listeners');
//
//        foreach($listeners as $listener)
//        {
//            $this->app['events']->listen('Iceflow.*', $listener);
//        }

        $this->app->bind('Laracasts\Commander\CommandTranslator', 'Iceflow\Core\Services\IceflowCommandTranslator');
    }
}