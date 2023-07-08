<?php 

function includeWithSlashes($paths, $context = []) {
    if (!is_array($paths)) {
        $paths = [$paths];
    }

    foreach ($paths as $path) {
        $normalizedPath = str_replace('/', DIRECTORY_SEPARATOR, $path);
        
        if (!empty($context)) {
            extract($context, EXTR_SKIP);
        }
        
        include $normalizedPath;
    }
}

function requireOnceWithSlashes($paths, $context = []) {
    if (!is_array($paths)) {
        $paths = [$paths];
    }

    foreach ($paths as $path) {
        $normalizedPath = str_replace('/', DIRECTORY_SEPARATOR, $path);
        
        if (!empty($context)) {
            extract($context, EXTR_SKIP);
        }
        
        require_once $normalizedPath;
    }
}


?>