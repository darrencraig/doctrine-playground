<?php namespace Iceflow\Users;

use Doctrine\ORM\EntityManagerInterface;
use Iceflow\Users\Repositories\DoctrineUserRepository;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Iceflow\Users\Repositories\UserRepository', function(){
            $entityManager = $this->app->make('Doctrine\ORM\EntityManagerInterface');
            return new DoctrineUserRepository($entityManager->getRepository('Iceflow\Users\User'), $entityManager);
        });
    }
}