<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
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
          Validator::extend('parent', function($attribute, $value, $parameters, $validator) {
            $id = $parameters[0];
            $categories = Category::where('id', '<>', $id)
                ->where(function($query) use($id) {
                    $query->where('parent_id', '<>', $id)
                        ->orWhereNull('parent_id');
                })
                ->pluck('id')->toArray();
            if (!in_array($value, $categories)) {
                return false;
            }
            return true;
        }, 'You try to enter invalid parent , please select valid parent category!');
    }
}
