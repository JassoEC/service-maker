<?php

namespace Ecjasso\ServiceMaker\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class CreateRepositoryCommand extends GeneratorCommand
{
    /**
     * The name of your command.
     * This is how your Artisan's command shall be invoked.
     */
    protected $name = 'make:repository  {--model}';

    /**
     * A short description of the command's purpose.
     * You can see this working by executing
     * php artisan list
     */
    protected $description = 'Create a repository class file';

    /**
     * Class type that is being created.
     * If command is executed successfully you'll receive a
     * message like this: $type created succesfully.
     * If the file you are trying to create already
     * exists, you'll receive a message
     * like this: $type already exists!
     */
    protected $type = 'Repository';

    /**
     * Specify your Stub's location.
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/repository.stub';
    }

    /**
     * The root location where your new file should
     * be written to.
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories';
    }

    /**
     * Get the options for replacing in stub file
     *
     * @return void
     */
    protected function getOptions()
    {
        return [
            ['model', null, InputOption::VALUE_REQUIRED, 'The name of model class to atatch the repository file'],
        ];
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        $model = $this->option('model');

        $stub = str_replace(
            '{{model}}', $model, $stub
        );
        $stub = str_replace(
            '{{variable_model}}', strtolower($model), $stub
        );

        return $stub;
    }
}
