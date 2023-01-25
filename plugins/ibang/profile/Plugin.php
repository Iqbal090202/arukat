<?php namespace Ibang\Profile;

use Backend;
use System\Classes\PluginBase;
use Rainlab\User\Models\User as UserModel;
use Rainlab\User\Controllers\Users as UserController;

/**
 * Profile Plugin Information File
 */
class Plugin extends PluginBase
{
    public $require = ['Rainlab.User'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Profile',
            'description' => 'No description provided yet...',
            'author'      => 'Ibang',
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
        UserController::extendListColumns(function($list, $model) {
            if (!$model instanceof UserModel) {
                return;
            }

            $list->addColumns([
                'grade[text_grade]' => [
                    'label' => 'Grade'
                ]
            ]);
        });

        UserController::extendFormFields(function($form, $model, $context) {
            if (!$model instanceof UserModel) {
                return;
            }

            $form->addFields([
                'grade' => [
                    'label' => 'Grade',
                    'nameFrom' => 'text_grade',
                    'descriptionFrom' => 'description',
                    'span' => 'right',
                    'type' => 'relation'
                ]
            ]);
        });
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
            'Ibang\Profile\Components\MyComponent' => 'myComponent',
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
            'ibang.profile.some_permission' => [
                'tab' => 'Profile',
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
        return []; // Remove this line to activate

        return [
            'profile' => [
                'label'       => 'Profile',
                'url'         => Backend::url('ibang/profile/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['ibang.profile.*'],
                'order'       => 500,
            ],
        ];
    }
}
