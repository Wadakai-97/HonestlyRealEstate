<?php

namespace App\Providers;

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
    public function boot()
    {
        Collection::macro('exportCsv', function($filename = '', $filters = [], $encoding = 'UTF-8') {

            if(empty($filename)) {

                $filename = $this->first()->getTable() .'_'. date('Ymd_His') .'.csv';

            }

            $fluent = \FluentCsv::setEncoding($encoding);

            $this->each(function($item) use($fluent, $filters) {

                $row_data = [];

                if(empty($filters)) {

                    $row_data = array_values($item->toArray());

                } else {

                    foreach($filters as $filter) {

                        if(is_callable($filter)) {

                            $row_data[] = $filter($item);

                        }

                    }

                }

                $fluent->addData($row_data);

            });

            return $fluent->download($filename);

        });
    }
}
