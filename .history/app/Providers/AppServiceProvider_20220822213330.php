<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Collection;

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
        Collection::macro('exportCsv', function($file_name = '', $item_name = [], $filters = [], $encoding = 'UTF-8') {

            if(empty($file_name)) {
                $file_name = $this->first()->getTable() .'_'. date('Ymd_His') .'.csv';
            }

            $fluent = \FluentCsv::setEncoding($encoding);

            if(!empty($item_name)) {
                $fluent->addData($item_name);
            }

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
            return $fluent->download($file_name);
        });
    }
}
