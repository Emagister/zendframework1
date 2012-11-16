#!/bin/sh
find ../src/Zend -name '*.php' | grep -v './Loader/Autoloader.php' | xargs sed -E -i~ 's/(require_once)/\/\/ \1/g'
find ../src/Zend -name '*.php~' | xargs rm -f
find ../src/ZendX -name '*.php' | grep -v './Loader/Autoloader.php' | xargs sed -E -i~ 's/(require_once)/\/\/ \1/g'
find ../src/ZendX -name '*.php~' | xargs rm -f