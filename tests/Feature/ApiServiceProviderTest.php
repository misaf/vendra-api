<?php

declare(strict_types=1);

use Misaf\VendraApi\Providers\ApiServiceProvider;

it('loads the shared api service provider', function (): void {
    expect($this->app->providerIsLoaded(ApiServiceProvider::class))->toBeTrue();
});
