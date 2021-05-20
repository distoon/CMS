<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $event)
    {
        $event->listen(BuildingMenu::class, function (BuildingMenu $event) {
        $event->menu->add(

        );
        if(\Auth::check()){
          if(\Auth::user()->role == 0){
            $event->menu->add(['header' => 'Admin']);
            $event->menu->add(
                [
                    'text'    => 'Products',
                    'icon'    => 'fas fa-fw fa-share',
                    'submenu' => [
                        [
                            'text' => 'Manage Glasses',
                            'url'  =>  '#',
                        ],
                        
                        [
                            'text' => 'Manage Lenses',
                            'url'  => '#',
                        ],
                    ],
                ],
                [
                    'text'    => 'Clients & Employees',
                    'icon'    => 'fas fa-fw fa-share',
                    'submenu' => [
                        [
                            'text' => 'Manage Clients',
                            'url'  => route('add.hall'),
                        ],
                        
                        [
                            'text' => 'Manage Employees',
                            'url'  => route('list.hall'),
                        ],
                    
                    ],
                ],
                [
                    'text'    => 'Transactions',
                    'icon'    => 'fas fa-fw fa-share',
                    'submenu' => [
                        [
                            'text' => 'Manage Sales Invoices',
                            'url'  => '#',
                        ],
                        [
                            'text' => 'Manage Purchases Invoices',
                            'url' => '#',
                        ],
                        [
                            'text' => 'Internal Transactions',
                            'url' => '#',
                        ],
                    
                    ],
                ]
             );
          }
          if(\Auth::user()->role == 1) {
            $event->menu->add(['header' => 'Courses']);
            $event->menu->add(
                [
                'text'    => 'Register Your Courses',
                'icon'    => 'fas fa-fw fa-share',
                'url' => route('regitser.courses'),
                ],
                [
                'text'    => 'View Registerd Courses',
                'icon'    => 'fas fa-fw fa-share',
                'url' => route('get.show.course'),
                ]
            );
          }
          if(\Auth::user()->role == 2) {
            $event->menu->add(['header' => 'Courses']);
            $event->menu->add(
                [
                'text'    => 'View Your Courses',
                'icon'    => 'fas fa-fw fa-share',
                'url' => route('list.course.instructor', \Auth::user()->user_name),
                ]
            );
          }
        }
      });
    }
}
