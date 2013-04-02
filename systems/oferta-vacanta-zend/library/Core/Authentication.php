<?php
    class Core_Authentication extends Zend_Controller_Plugin_Abstract
    {

        private $_whitelist;

        public function __construct()
        {
            $this->_whitelist = array(
                'login',
            );
        }

        public function preDispatch(Zend_Controller_Request_Abstract $request)
        {
            $controller = strtolower($request->getControllerName());
//            $action = strtolower($request->getActionName());
//            $route = $controller . '/' . $action;

            $module = strtolower($request->getModuleName());

            if (in_array($controller, $this->_whitelist) || $module != 'admin') {
                return;
            }

            $auth = Zend_Auth::getInstance();

            if ($auth->hasIdentity()) {
                return;
            }

            Zend_Controller_Request_Abstract::setDispatched(false);
            Zend_Controller_Action_HelperBroker::getStaticHelper('redirector')->setGotoSimple('index', 'login', 'admin');
        }
    }
