<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

if (! function_exists('convert_array_access')) {
    function convert_array_access($str)
    {
        $string = preg_replace('/\[(\w+)\]/', '.$1', $str, 1);

        // Handle subsequent conversions
        return preg_replace('/\[(\w+)\]/', '.$1', $string);
    }
}

if (! function_exists('commentable')) {
    function commentable($commentable)
    {
        if ($commentable instanceof Model) {
            return Str::of(get_class($commentable))
                ->explode('\\')
                ->map(fn ($part) => Str::snake($part))
                ->join('.').':'.$commentable->getRouteKey();
        }

        if (is_string($commentable)) {
            if (Str::contains($commentable, ':')) {
                [$commentable, $id] = explode(':', $commentable);

                $class = Str::of($commentable)
                    ->explode('.')
                    ->map(fn ($part) => Str::studly($part))
                    ->join('\\');

                $instance = new $class;

                return $instance::where($instance->getRouteKeyName(), $id)->firstOrFail();
            }

            return Str::of($commentable)
                ->explode('.')
                ->map(fn ($part) => Str::studly($part))
                ->join('\\');
        }

        throw new BadMethodCallException('Invalid argument passed to commentable()');
    }
}

if (! function_exists('payable')) {
    function payable($payable)
    {
        if ($payable instanceof Model) {
            return Str::of(get_class($payable))
                ->explode('\\')
                ->map(fn ($part) => Str::snake($part))
                ->join('.').':'.$payable->getRouteKey();
        }
        if (is_string($payable)) {
            if (Str::contains($payable, ':')) {
                [$payable, $id] = explode(':', $payable);
                $class = Str::of($payable)
                    ->explode('.')
                    ->map(fn ($part) => Str::studly($part))
                    ->join('\\');
                $instance = new $class;

                return $instance::where($instance->getRouteKeyName(), $id)->firstOrFail();
            }

            return Str::of($payable)
                ->explode('.')
                ->map(fn ($part) => Str::studly($part))
                ->join('\\');
        }
        throw new BadMethodCallException('Invalid argument passed to payable()');
    }
}

function task($callable)
{
    return new class($callable)
    {
        protected $task;

        public function __construct($callable)
        {
            $this->task = $callable;
        }

        public function then($after)
        {

            call_user_func($this->task);

            return new self($after);
        }

        public function exec()
        {
            return call_user_func($this->task);
        }
    };
}
