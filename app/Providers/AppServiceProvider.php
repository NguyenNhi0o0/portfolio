<?php

namespace App\Providers;

use App\Models\Content;
use App\Models\Project;
use App\Models\Image;
use App\Models\Education;
use App\Models\Experience;
// use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // từ db tới mọi view
        Blade::directive('content', function ($title) {
            return "<?php echo App\Models\Content::where('title', $title)->first()->description; ?>";
        });

        //background css
        Blade::directive('imageAsBackground', function ($category) {
            return "<?php \$imageUrl = \App\Models\Image::where('category', $category)->first()->src ?? 'default.png'; echo \"style='background-image: url('\" . asset(\$imageUrl) . \"')';\" ?>";
        });

        //education
        View::composer('*', function ($view) {
            $educations = Education::all(); // Get all education records
            $view->with('educations', $educations);
        });

        //experience
        View::composer('*', function ($view) {
            $experiences = Experience::all(); // Get all education records
            $view->with('experiences', $experiences);
        });

        //project
        View::composer('*', function ($view) {
            $projects = Project::all(); // Get all education records
            $view->with('projects', $projects);
        });

        // Using closure based composers
        // ['*'] áp dụng cho tất cả các view
        View::composer(['*'], function ($view) {
            // Lấy tất cả ảnh theo category
            $imagesByCategory = Image::all()->groupBy('category');
            //  lấy favicon
            $favicon = Image::where('category', 'Icon')->first();
            // Gán biến 'imagesByCategory' cho tất cả views
            $view->with('imagesByCategory', $imagesByCategory);
            // Gán favicon cho tất cả views
            $view->with('favicon', $favicon);
        });
    }
}
