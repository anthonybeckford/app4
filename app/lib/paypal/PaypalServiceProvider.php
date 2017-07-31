<?php namespace Lib\Paypal;

use Illuminate\Support\ServiceProvider;
use Lib\Paypal\PaypalController;

class PaypalServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->package('lib/paypal');

        include __DIR__ . '/routes.php';
    }

    public function register()
    {
        $this->app->singleton('paypal.payment', function () {
            return new PaypalController();
        });
    }


}