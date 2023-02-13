<?php
namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * QueryFilter
 */
abstract class QueryFilter
{
    protected Request $request;

    protected Builder $builder;

    protected $delimiter = ',';

    /**
     * __construct
     *
     * @param  Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * apply
     *
     * @param  Builder $builder
     * @return void
     */
    public function apply(Builder $builder):Builder
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            if (method_exists($this, $name)) {
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }

        return $this->builder;
    }

    /**
     * filters
     *
     * @return array
     */
    public function filters():array
    {
        $params = $this->request->query();
        Unset($params['page']);
        Unset($params['per_page']);
        return $params;
    }

    /**
     * paramToArray
     *
     * @param  mixed $param
     * @return void
     */
    protected function paramToArray(string $param)
    {
        return explode($this->delimiter, $param);
    }
}
