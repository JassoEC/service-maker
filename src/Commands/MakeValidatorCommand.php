<?php

namespace Jassoec\ServiceMaker\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class MakeValidatorCommand extends GeneratorCommand
{
    /**
     * The name of your command.
     * This is how your Artisan's command shall be invoked.
     */
    protected $name = 'make:validator';

    /**
     * A short description of the command's purpose.
     * You can see this working by executing
     * php artisan list
     */
    protected $description = 'Create a validator class file';

    /**
     * Class type that is being created.
     * If command is executed successfully you'll receive a
     * message like this: $type created succesfully.
     * If the file you are trying to create already
     * exists, you'll receive a message
     * like this: $type already exists!
     */
    protected $type = 'Validator';

    /**
     * Specify your Stub's location.
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/validator.stub';
    }

    /**
     * The root location where your new file should
     * be written to.
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Validators';
    }

}
