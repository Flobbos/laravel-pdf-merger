<?php

namespace Flobbos\PDFMerger;

use Illuminate\Support\ServiceProvider;

class PDFMergerServiceProvider extends ServiceProvider{
    
    public function boot(){
        //Publish config and translations
        $this->publishes([
            __DIR__.'/../config/crudable.php' => config_path('crudable.php'),
            __DIR__.'/../resources/lang' => resource_path('lang')
        ]);
    }

    /**
     * Register the service provider.
     */
    public function register(){
        //Merge config
        $this->mergeConfigFrom(
            __DIR__.'/../config/crudable.php', 'crudable'
        );
        //Load config
        $config = $this->app->make('config');
        //Check for auto binding
        if($config->get('crudable.use_auto_binding')){
            //Run contextual binding first
            foreach($config->get('crudable.implementations') as $usage){
                $this->app->when($usage['when'])
                    ->needs(isset($usage['needs'])?$usage['needs']:\Flobbos\Crudable\Contracts\Crud::class)
                    ->give($usage['give']);
            }
            //Run fixed bindings
            foreach($config->get('crudable.bindings') as $binding){
                $this->app->bind($binding['contract'],$binding['target']);
            }
        }
    }
}