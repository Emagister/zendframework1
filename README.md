# Emagister Zend Framework 1.12.x Mirror #

## Added features ##

* Stripped all ```require_once```
* The class ```Zend_Loader_PluginLoader``` triggers the autoload when trying to include a plugin. This is mainly for
  improve the PluginLoader performance when using classmaps.