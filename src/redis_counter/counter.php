<?php
    $redis = new Redis();
    $redis->connect("redis0cache", "6379");
    //$_SERVER['SCRIPT_URI'] isn't available in some configuration
    //see http://stackoverflow.com/a/29049193
    if (!isset($_SERVER['SCRIPT_URI'])) {
        $_SERVER['SCRIPT_URI'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $pos = strrpos($_SERVER['SCRIPT_URI'], '/');
        if ($pos !== false) {
            $_SERVER['SCRIPT_URI'] = substr($_SERVER['SCRIPT_URI'], 0, $pos + 1);
        }
    }
    $URL = $_SERVER["SCRIPT_URI"];
    $UA = $_SERVER["HTTP_USER_AGENT"];
    $d = date("Ymd");
    $userkey_ua = "stats:" . $d . ":ua:" . md5($URL);
    $userkey_url = "stats:" . $d . ":url:" . md5($URL);
    $userkey_glob = "stats:" . $d;
    $redis->sadd($userkey_ua, md5($UA));
    $redis->incr($userkey_url);
    $redis->incr($userkey_glob);

    // Optionally set expire 25 hours from now one,
    // to be sure will be available until tomorrow.
    $redis->expire($userkey_ua, 3600 * 25);
    $redis->expire($userkey_url, 3600 * 25);
    // we want $userkey_glob to expire in 32 days
    $redis->expire($userkey_glob, 3600 * 24 * 32);

    echo sprintf(
        "This page was visited %d times today, with %d different browsers!",
        $redis->get($userkey_url),
        $redis->scard($userkey_ua)
    );
