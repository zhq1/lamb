<?php

/*
 * The Auth Plugin
 * Link http://github.com/typefo/lamb
 * Copyright (C) typefo <typefo@qq.com>
 */

class AuthPlugin extends Yaf\Plugin_Abstract {
	public function routerShutdown(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response) {
	    $session = Yaf\Session::getInstance();

	    $module = $request->getModuleName();
	    $controller = $request->getControllerName();
	    $Action = $request->getActionName();

        if (!(in_array($module, ['Index']) && in_array($controller, ['Index', 'Login']))) {
            if (!$session->login) {
                $response->setRedirect('/');
                $response->response();
                exit(0);
            }
        }
	}
}
