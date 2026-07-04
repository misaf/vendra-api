<?php

declare(strict_types=1);

namespace Misaf\VendraApi\JsonApi\Sorting;

use LaravelJsonApi\Eloquent\Contracts\SortField;

final class RandomPositionSort implements SortField
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Create a new sort field.
     *
     * @param string $name
     * @return self
     */
    public static function make(string $name): self
    {
        return new static($name);
    }

    /**
     * Apply the sort order to the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $direction
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function sort($query, string $direction = 'asc')
    {
        return $query->inRandomOrder();
    }

    public function sortField(): string
    {
        return $this->name;
    }
}
