<?php

// @ifUserPaid
\Blade::extend(function ($view, $compiler) {
    $pattern = $compiler->createPlainMatcher('ifUserPaid');

    return preg_replace(
        $pattern,
        '$1<?php if ( \Auth::check() && \Auth::user()->hasPaid() ): ?>',
        $view
    );
});

