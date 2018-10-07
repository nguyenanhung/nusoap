<?php
/**
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 9/19/18
 * Time: 13:37
 */
spl_autoload_register(function ($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName = __DIR__ . DIRECTORY_SEPARATOR . $fileName . $className . '.php';
    //
    if (strpos($fileName, 'nguyenanhung\MyNuSOAP\Interfaces') !== FALSE) {
        $fileName = str_replace('nguyenanhung\MyNuSOAP\Interfaces', 'src\Interfaces', $fileName);
    } elseif (strpos($fileName, 'nguyenanhung\MyNuSOAP\Repository') !== FALSE) {
        $fileName = str_replace('nguyenanhung\MyNuSOAP\Repository', 'src\Repository', $fileName);
    } elseif (strpos($fileName, 'nguyenanhung\MyFixNuSOAP') !== FALSE) {
        $fileName = str_replace('nguyenanhung\MyFixNuSOAP', 'src-fix', $fileName);
    } else {
        $fileName = str_replace('nguyenanhung\MyNuSOAP', 'src', $fileName);
    }

    if (file_exists($fileName)) {
        require $fileName;

        return TRUE;
    }

    return FALSE;
});
