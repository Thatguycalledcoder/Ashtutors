<?php
    function getIP() {
        if (!empty($_SERVER["HTTP_CLIENT_IP"]))
        {
            // Check for IP address from shared Internet
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            // Check for the proxy user
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        else
        {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
        return $ip;
    }
?>