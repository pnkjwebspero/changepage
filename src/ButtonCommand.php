<?php

namespace Pnkjwebspero\Changepage;

use Illuminate\Console\Command;
use InvalidArgumentException;

class ButtonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Changepage:js
                    { type=bootstrap : The preset type (bootstrap) }
                    {--views : Only scaffold the authentication views}
                    {--force : Overwrite existing views by default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold basic login and registration views and routes';

    /**
     * The JS Files that need to be exported.
     *
     * @var array
     */

    protected $componentJSFiles = [
        'button.js' => 'button.jsx',
    ];

    protected $storeJSFiles = [
        'auth.context.js' => 'auth.context.jsx',
    ];

    protected $rootJSFiles = [
        'app.js' => 'app.jsx',
    ];

    /**
     * Execute the console command.
     *
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function handle()
    {
        if (static::hasMacro($this->argument('type'))) {
            return call_user_func(static::$macros[$this->argument('type')], $this);
        }

        if (! in_array($this->argument('type'), ['bootstrap'])) {
            throw new InvalidArgumentException('Invalid preset.');
        }
        $this->exportJS();
        $this->components->info('Authentication scaffolding generated successfully.');
    }

   

    /**
     * Export the JS Files.
     *
     * @return void
     */
    protected function exportJS()
    {
        foreach ($this->componentJSFiles as $key => $value) {
            if (file_exists($componentJS = $this->getComponentsJsPath($value)) && ! $this->option('force')) {
                if (! $this->components->confirm("The [$value] js file already exists. Do you want to replace it?")) {
                    continue;
                }
            }

            copy(
                __DIR__.'/js/Components/'.$key,
                $componentJS
            );
        }

        foreach ($this->storeJSFiles as $key => $value) {
            if (file_exists($storeJS = $this->getStoreJsPath($value)) && ! $this->option('force')) {
                if (! $this->components->confirm("The [$value] js file already exists. Do you want to replace it?")) {
                    continue;
                }
            }

            copy(
                __DIR__.'/js/Store/'.$key,
                $storeJS
            );
        }

        foreach ($this->rootJSFiles as $key => $value) {
            if (file_exists($rootJS = $this->getStoreJsPath($value)) && ! $this->option('force')) {
                if (! $this->components->confirm("The [$value] js file already exists. Do you want to replace it?")) {
                    continue;
                }
            }

            copy(
                __DIR__.'/js/'.$key,
                $rootJS
            );
        }
    }

    

    /**
     * Get full Components JS path relative to the application's configured JS path.
     *
     * @param  string  $path
     * @return string
     */
    protected function getComponentsJsPath($path)
    {
        if (!is_dir($directory = resource_path('js/Components'))) {
            mkdir($directory, 0755, true);
        }
        
        return implode(DIRECTORY_SEPARATOR, [
            resource_path('js/Components'), $path,
        ]);
    }


    /**
     * Get full Store JS path relative to the application's configured JS path.
     *
     * @param  string  $path
     * @return string
     */
    protected function getStoreJsPath($path)
    {
        if (!is_dir($directory = resource_path('js/Store'))) {
            mkdir($directory, 0755, true);
        }
        
        return implode(DIRECTORY_SEPARATOR, [
            resource_path('js/Store'), $path,
        ]);
    }

    /**
     * Get full Root JS path relative to the application's configured JS path.
     *
     * @param  string  $path
     * @return string
     */
    protected function getRootJsPath($path)
    {
        if (!is_dir($directory = resource_path('js'))) {
            mkdir($directory, 0755, true);
        }
        
        return implode(DIRECTORY_SEPARATOR, [
            resource_path('js'), $path,
        ]);
    }
}
