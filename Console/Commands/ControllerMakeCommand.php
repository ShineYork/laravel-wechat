<?php

namespace ShineYork\LaravelWechat\Console\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand as Command;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Str;

/*
因为在框架中,就是laravel自带的 make:controller已经提供了项目的基本功能

自定功能只是对于其原有的功能进行一步改变和补充 -> 就可以采用继承的思想 ; 重写方法
 */
class ControllerMakeCommand extends Command
{
    // protected $signature = 'swechat-make:controller';
    protected $name = 'swechat-make:controller';
    protected $description = '这是组件中的创建Controller的命令';

    protected $namespace = "ShineYork\LaravelWechat\Http\Controllers";

    protected function qualifyClass($name)
    {
        $name = ltrim($name, '\\/');
        return $this->namespace.'\\'.$name;
    }
    protected function getPath($name)
    {
        // $this->rootNamespace() => App => ShineYork\LaravelWechat
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        // var_dump($name);
        return app()->basePath().'\\vendor\shineyork\laravel-wechat\\'.str_replace('\\', '/', $name).'.php';
    }
    public function rootNamespace()
    {
        return "ShineYork\LaravelWechat\\";
    }
}
