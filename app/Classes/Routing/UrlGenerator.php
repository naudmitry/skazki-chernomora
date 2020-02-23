<?php

namespace App\Classes\Routing;

use Illuminate\Routing\UrlGenerator as BaseUrlGenerator;

class UrlGenerator extends BaseUrlGenerator
{
    /**
     * @param \Illuminate\Routing\Route $route
     * @param mixed $parameters
     * @param bool $absolute
     * @return string
     * @throws \Illuminate\Routing\Exceptions\UrlGenerationException
     */
    protected function toRoute($route, $parameters, $absolute)
    {
        $parameters = is_array($parameters) ? $parameters : [$parameters];

        if (in_array('administeredCompany', $route->parameterNames()) && !array_get($parameters, 'administeredCompany')) {
            if ($route->hasParameter('administeredCompany')) {
                $parameters['administeredCompany'] = $route->parameter('administeredCompany');
            } else {
                $parameters['administeredCompany'] = config('admin.administeredCompany');
            }
        }

        if (in_array('administeredShowcase', $route->parameterNames()) && !array_get($parameters, 'administeredShowcase')) {
            if ($route->hasParameter('administeredShowcase')) {
                $parameters['administeredShowcase'] = $route->parameter('administeredShowcase');
            } else {
                $parameters['administeredShowcase'] = config('admin.administeredShowcase');
            }
        }

        return parent::toRoute($route, $parameters, $absolute);
    }
}
