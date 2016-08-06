<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Entities\Book;
use App\Jobs\SendEmailForNotification;
use Illuminate\Support\Facades\Bus;
use Illuminate\Queue\Events\JobFailed;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * event on creating book
         */
        Book::created(function($model) {
            Bus::dispatch(new SendEmailForNotification($model));
        });

        /**
         * if job failed
         */
        \Queue::failing(function (JobFailed $event) {
            /**
             * Notify if job failed
             */
                $command = (unserialize($event->data['data']['command']));
                $command->failed();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);
    }
}
