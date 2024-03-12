<?php

spl_autoload_register(function ($class_name) {
    $namespace = str_replace("\\","/",__NAMESPACE__);
    $className = str_replace("\\","/", $class_name);
    $class = __DIR__.(empty($namespace)?"/":$namespace."/")."{$className}.php";

    include_once($class);
});
