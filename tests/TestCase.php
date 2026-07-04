<?php

declare(strict_types=1);

namespace Misaf\VendraApi\Tests;

use Illuminate\Support\Facades\Http;
use Misaf\VendraApi\Providers\ApiServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Override;

abstract class TestCase extends OrchestraTestCase
{
    #[Override]
    protected function setUp(): void
    {
        parent::setUp();

        Http::preventStrayRequests();
    }

    #[Override]
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('activitylog', [
            'enabled'                             => false,
            'delete_records_older_than_days'      => 365,
            'default_log_name'                    => 'default',
            'default_auth_driver'                 => null,
            'subject_returns_soft_deleted_models' => false,
            'activity_model'                      => \Spatie\Activitylog\Models\Activity::class,
            'table_name'                          => 'activity_log',
            'database_connection'                 => null,
        ]);
        $app['config']->set('eloquent-sortable.order_column_name', 'position');
    }

    #[Override]
    protected function getPackageProviders($app): array
    {
        return [
            ApiServiceProvider::class,
        ];
    }
}
