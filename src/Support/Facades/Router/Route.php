<?php

namespace Mahaelshawardy\MvcCore\Support\Facades\Router;

use Mahaelshawardy\MvcCore\Support\Facades\Middleware\RegisterMiddlewares;
use Mahaelshawardy\MvcCore\Exceptions\RouteNotFoundException;
use Tecsee\Calendar\Middlewares\Localization;
use Mahaelshawardy\MvcCore\Support\Http\Request;

class Route
{
    /**
     * plugin routes
     *
     * @var array
     */
    private static array $routes = [];

    /**
     * get request
     *
     * @param  $route
     * @param  $action
     * @return void
     */
    public static function get($route, $action): self
    {
        self::register($route, 'GET', $action);
        $static = new static();
        return $static;
    }

    /**
     * post request
     *
     * @param  $route
     * @param  $action
     * @return void
     */
    public static function post($route, $action): self
    {
        self::register($route, 'POST', $action);
        $static = new static();
        return $static;
    }

    /**
     * put request
     *
     * @param  $route
     * @param  $action
     * @return void
     */
    public static function put($route, $action): self
    {
        self::register($route, 'PUT', $action);
        $static = new static();
        return $static;
    }

    /**
     * patch request
     *
     * @param  $route
     * @param  $action
     * @return void
     */
    public static function patch($route, $action): self
    {
        self::register($route, 'PATCH', $action);
        $static = new static();
        return $static;
    }

    /**
     * delete request
     *
     * @param  $route
     * @param  $action
     * @return void
     */
    public static function delete($route, $action): self
    {
        self::register($route, 'DELETE', $action);
        $static = new static();
        return $static;
    }

    /**
     * resolve routes
     *
     * @param [string] $route
     * @param [string] $Request
     * @return RouteHandler
     */
    public static function resolve(string $fetch, string $requestType, ?int $pluginId = null)
    {
        if (!!stripos($fetch, '?') === false) {
            return;
        }

        $fetch = explode('?', $fetch)[1] ?? null;
        if (!$fetch) {
            return;
        }

        if (stripos($fetch, 'return') === 0) {
            $fetch = explode('=', $fetch)[1];
            $route = explode('&', $fetch)[0];
            $action = self::$routes[$requestType][$route] ?? null;
            if (!$action) {
                throw new RouteNotFoundException();
            }
            return RouteHandler::call($action, $pluginId);
        }

        if (stripos($fetch, 'redirect') === 0) {
            $fetch = explode('=', $fetch)[1];
            $route = explode('&', $fetch)[0];

            $action = self::$routes[$requestType][$route] ?? null;

            if (!$action) {
                throw new RouteNotFoundException();
            }
            return RouteHandler::call($action, $pluginId);
        }

        /*         if (!!stripos($fetch, '&') === true) {
                    $fetch = explode('&', $fetch)[1];
                } else {

                    $route = explode('=', $fetch)[1];
                    if ((int)$pluginId === (int)$route) {
                        return;
                    }
                } */

        $route = explode('=', $fetch)[1];

        $action = self::$routes[$requestType][$route] ?? null;

        if (!$action) {
            throw new RouteNotFoundException();
        }
        return RouteHandler::call($action, $pluginId);
    }

    /**
     * resolve routes
     *
     * @param [string] $route
     * @param [string] $Request
     * @return RouteHandler
     */
    public static function resolveApi(string $route, string $requestType)
    {
        $route = explode('io.php', $route)[1];
        $request = new Request();
        if (stripos($route, '?')) {
            $route = explode('?', $route)[0];
        }
        $action = self::$routes[$requestType][$route] ?? null;
        if (!$action) {
            $action = self::get_action($requestType, $route);
            if ($action === false) {
                throw new RouteNotFoundException();
            }
        }
        if ($route === '/csrf-token') {
            $middlewares = RegisterMiddlewares::get_route_middleware_to_call();
            foreach ($middlewares as $middleware) {
                $middleware = new $middleware();
                $middleware->handle();
            }
            return RouteHandler::call($action);
        }
        $middlewares = RegisterMiddlewares::list_called_middlewares();
        foreach ($middlewares as $key => $middleware) {
            $middleware = new $middleware();
            $middlewareAction = $middleware->get_action($action);

            if ($middlewareAction === $action) {
                $middleware->handle();
            }
        }
        return RouteHandler::call($action);
    }

    /**
     * handle route params
     *
     * @param [type] ...$action
     * @return void
     */
    private static function get_action(...$action)
    {
        [$requestType, $route] = $action;

        // get the request uri
        $uri = $route;

        // trim slashes from request uri
        $uri = trim($uri, '/');
        // get all routes for request type
        $routes = self::$routes[$requestType] ?? [];

        //route params 
        $routeParams = false;

        foreach ($routes as $route => $action) {
            // trim slashes for registered routes
            $route = trim($route, '/');
            $routeNames = [];

            if (!$route) {
                continue;
            }
            // find all route names from route  and save it in $routeNames 
            if (preg_match_all('/\{(\w+)(:[^}]+)?}/', $route, $matches)) {
                $routeNames = $matches[1];
            }
            // convert route name intor regex pattern
            $routeRegex = "@^" . preg_replace_callback(
                    '/\{(\w+)(:[^}]+)?}/',
                    fn($match) => isset($match[2]) ? "({$match[2]})" : '(\w+)',
                    $route
                ) . "$@";

            // test and match current route against $routeRegex
            if (preg_match_all($routeRegex, $uri, $valueMatches)) {
                $values = [];
                for ($i = 1; $i < count($valueMatches); $i++) {
                    $values[] = $valueMatches[$i][0];
                }
                $routeParams = array_combine($routeNames, $values);
                $request = new Request();
                $request->set_route_params($routeParams);
                return $action;
            }
        }
        return false;
    }

    public static function execute($controllerMethod)
    {
        $localization = new Localization();
        $localization->handle();
        return RouteHandler::call($controllerMethod);
    }

    public static function group(array $middlewares, callable $callback)
    {
        call_user_func($callback);
        foreach ($middlewares as $middleware) {
            $groupMiddleware = RegisterMiddlewares::get_middleware($middleware);
            $groupMiddleware = new $groupMiddleware();
            foreach (self::$routes as $route) {
                RegisterMiddlewares::register_middleware_to_call($middleware);
                foreach ($route as $routeActions) {
                    $groupMiddleware->register_action($routeActions);
                }
            }
        }
    }

    public static function middleware($route, string ...$middlewares)
    {
        foreach ($middlewares as $middleware) {
            RegisterMiddlewares::register_route_middleware_to_call($route, $middleware);
        }
        $static = new static();
        return $static;
    }

    public function route($route, $action): self
    {
        self::register($route, 'POST', $action);
        return $this;
    }

    /**
     * register routes
     *
     * @param string $route
     * @param string $Request
     * @param  $action
     * @return void
     */
    private static function register(string $route, string $requestType, $action): void
    {
        self::$routes[$requestType][$route] = $action;
    }

    public static function routes_list(): array
    {
        return self::$routes;
    }
}
