<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
class WidgetMake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'widget:make {theme} {widget}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make widget';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $theme = $this->getThemeInput();
        $widget = $this->getWidgetInput();
        $widgetPath = app_path("Widgets/{$theme}");
        $widgetFilePath = app_path("Widgets/{$theme}/{$widget}.php");
        // Make directory widget
        $this->makeDirectory($widgetPath);
        if ($this->alreadyExists($widgetFilePath)) {
            $this->error('Widget already exists!');

            return false;
        }

        $this->file->put($widgetFilePath);
    }

    /**
     * Get theme name
     *
     * @return string
     */
    protected function getThemeInput()
    {
        return trim($this->argument('theme'));
    }

    /**
     * Get theme name
     *
     * @return string
     */
    protected function getWidgetInput()
    {
        return trim($this->argument('widget'));
    }

    /**
     * Get theme name
     *
     * @return string
     */
    protected function getFieldInput()
    {
        return trim($this->argument('field'));
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/widget.stub';
    }

    /**
     * Determine if the class already exists.
     *
     * @param string $rawName
     * @return bool
     */
    protected function alreadyExists($rawName)
    {
        return $this->files->exists($rawName);
    }

    /**
     * Determine if the class already exists.
     *
     * @param  string  $rawName
     * @return bool
     */
    protected function alreadyDirectory($rawName)
    {
        return $this->files->isDirectory($rawName);
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (! $this->alreadyDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }
    }
}
