<?php namespace Wezeo\Tasks;

use Backend;
use System\Classes\PluginBase;

/**
 * tasks Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'tasks',
            'description' => 'No description provided yet...',
            'author'      => 'wezeo',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Wezeo\Tasks\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'wezeo.tasks.some_permission' => [
                'tab' => 'tasks',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        //return []; // Remove this line to activate

        return [
            'tasks' => [
                'label'       => 'Tasks',
                'url'         => Backend::url('wezeo/tasks/Tasks'),
                'icon'        => 'icon-cog',
                'permissions' => ['wezeo.tasks.*'],
                'order'       => 500,
            ],
        ];
    }
}
