<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDb(){
        $app = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'production');
        $db_adapt =  Zend_Db::factory($app->resources->db->adapter, $app->resources->db->params->toArray());
        Zend_Registry::set('db', $db_adapt);

    }


    protected function _initPhpParam(){
        //set some php setting
        error_reporting(E_ALL ^ E_DEPRECATED);
        error_reporting(E_ERROR | E_PARSE);
    }
}

