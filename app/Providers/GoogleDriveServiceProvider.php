<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\FilesystemAdapter;

class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
          \Storage::extend("google",function($app,$config){
            dd("fsd1");
             $client = new \Google_Client;
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);   
            $service = new \Google_Service_Device($client);
            $adapter = new GoogleDriveAdapter($service,$config['folderId']);
            dd($adapter);
            return new Filesystem($adapter);

        });  
        try {
           
            \Storage::extend('google', function($app, $config) {
             
                $client = new \Google\Client();
                $client->setClientId($config['clientId']);
                $client->setClientSecret($config['clientSecret']);
                $client->refreshToken($config['refreshToken']);
                
                $service = new \Google\Service\Drive($client);
                $adapter = new \Masbug\Flysystem\GoogleDriveAdapter($service, $config['folderId'] );
               
                $driver = new \League\Flysystem\Filesystem($adapter);
                $filesystem = new FilesystemAdapter($driver, $adapter);
               // $filesystem->addPlugin(new League\Flysystem\Plugin\get_meta_tags());
                return $filesystem;
              
            });
        } catch(\Exception $e) {
            dd("exception".$e);
        }
        
    }
}
