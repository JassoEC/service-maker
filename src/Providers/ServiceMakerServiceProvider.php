<?php

namespace Ecjasso\ServiceMaker\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceMakerServiceProvider extends ServiceProvider
{
/**
 * The commands to be registered.
 *
 * @var array
 */

    protected $commands = [
        'RepositoryMake' => 'command.repository.make',
        'ServiceMake'    => 'command.service.make',
        'TraitMake'      => 'command.trait.make',
        'ValidatorMake'  => 'command.validator.make',
    ];

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands($this->commands);
    }

    /**
     * Register the given commands.
     *
     * @param array $commands
     */
    protected function registerCommands(array $commands)
    {
        foreach (array_keys($commands) as $command) {
            $method = "register{$command}Command";

            call_user_func_array([$this, $method], []);
        }

        $this->commands(array_values($commands));
    }

    /**
     * Register the command.
     */
    protected function registerServiceMakeCommand()
    {
        $this->app->singleton('command.service.make', function ($app) {
            return new \Ecjasso\ServiceMaker\Commands\CreateServiceCommand($app['files']);
        });
    }

    /**
     * Register the command.
     */
    protected function registerRepositoryMakeCommand()
    {
        $this->app->singleton('command.repository.make', function ($app) {
            return new \Ecjasso\ServiceMaker\Commands\CreateRepositoryCommand($app['files']);
        });
    }

    /**
     * Register the command.
     */
    protected function registerTraitMakeCommand()
    {
        $this->app->singleton('command.trait.make', function ($app) {
            return new \Ecjasso\ServiceMaker\Commands\CreateTraitCommand($app['files']);
        });
    }

    /**
     * Register the command.
     */
    protected function registerValidatorMakeCommand()
    {
        $this->app->singleton('command.validator.make', function ($app) {
            return new \Ecjasso\ServiceMaker\Commands\MakeValidatorCommand($app['files']);
        });
    }
}
