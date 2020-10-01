<?php namespace Apolonia\Resources;

use System\Classes\PluginBase;

class Plugin extends PluginBase{
    public function pluginDetails()
    {
        return [
            'name' => 'Apolonia',
            'description' => 'Made By Sandro Skhirtladze',
            'author' => 'Sandro',
            'icon' => 'icon-leaf'
        ];
    }

    public function registerComponents()
    {
        return [
            '\Apolonia\Resources\Components\Links' => 'resourcesLinks'
        ];
    }
}
