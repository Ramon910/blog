<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText', 'components.form.text', ['name', 'title', 'value'=> null, 'attributes' => []]);
        Form::component('bsTextArea', 'components.form.textarea', ['name', 'title', 'value'=> null, 'attributes' => []]);
        Form::component('bsSubmit', 'components.form.submit', ['value'=> 'Submit', 'attributes' => []]);
        Form::component('bsSelect', 'components.form.select',['name', 'value'=>[], 'selected' => null,'attributes' => []]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
