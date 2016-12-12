<?php
namespace App\Providers;

use Fx3costa\Laravelchartjs\Providers\ChartjsServiceProvider;
use App\Charts\MyChartBar;
use App\Charts\MyChartLine;
use App\Charts\MyChartPieAndDoughnut;
use App\Charts\MyChartRadar;

class MyChartjsServiceProvider extends ChartjsServiceProvider
{
    /**
     * Array with colours configuration of the chartjs config file
     * @var array
     */
    protected $colours = [];
    public function boot()
    {
      $this->loadViewsFrom(__DIR__.'/../../resources/views/ChartJS', 'autoload');
      $this->loadViewsFrom(__DIR__.'/../../resources/views/ChartJS', 'chart-bar');
      $this->loadViewsFrom(__DIR__.'/../../resources/views/ChartJS', 'chart-line');
      $this->loadViewsFrom(__DIR__.'/../../resources/views/ChartJS', 'chart-radar');
      $this->loadViewsFrom(__DIR__.'/../../resources/views/ChartJS', 'chart-pie-doughnut');
      $this->colours = config('chartjs.colours');
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('chartbar', function() {
            return new MyChartBar($this->colours['bar']);
        });
        $this->app->bind('chartline', function() {
            return new MyChartLine($this->colours['line']);
        });
        $this->app->bind('chartpiedoughnut', function() {
            return new MyChartPieAndDoughnut($this->colours['pie']);
        });
        $this->app->bind('chartradar', function() {
            return new MyChartRadar($this->colours['radar']);
        });
    }
}
