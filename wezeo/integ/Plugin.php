<?php namespace Wezeo\Integ;

use Backend;
use System\Classes\PluginBase;

/**
 * integ Plugin Information File
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
            'name'        => 'integ',
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
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        //return []; // Remove this line to activate

        return [
            'integ' => [
                'label'       => 'Projects',
                'url'         => Backend::url('wezeo/integ/records'),
                'icon'        => 'icon-cog',
                'permissions' => ['wezeo.integ.*'],
                'order'       => 500,
            ],
        ];
    }
}
