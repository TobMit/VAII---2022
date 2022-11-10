<?php

namespace App\Config;

use App\Auth\DummyAuthenticator;
use App\Auth\loginAuthenticator;

/**
 * Class Configuration
 * Main configuration for the application
 * @package App\Config
 */
class Configuration
{
    public const APP_NAME = 'Vajííčko MVC FW';
    public const FW_VERSION = '2.0';

    public const DB_HOST = 'db';  // change to db, if docker is used
    public const DB_NAME = 'blogTest';
    public const DB_USER = 'root';
    public const DB_PASS = 'heslo';

    public const LOGIN_URL = '?c=auth&a=login';

    public const ROOT_LAYOUT = 'root';

    public const DEBUG_QUERY = false;

    public const AUTH_CLASS = loginAuthenticator::class;
}