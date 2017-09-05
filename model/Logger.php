<?php
    final class Logger
    {
        /* @var string Constant tmp directory path */
        private static $TMP = '../tmp/';

        /**
         * Logs a user action
         */
        public static function logAction($message)
        {
            error_log('INFO: ' . date('d-m-Y h:i:s') . ' - ' . self::getClientIP() . ' - ' . $message . "\n", 3, self::$TMP . 'useraction.log');
        }

        /**
         * Logs errors
         */
        public static function logError($message)
        {
            error_log('ERROR: ' . date('d-m-Y h:i:s') . ' - ' . self::getClientIP() . ' - ' . $message . "\n", 3, self::$TMP . 'useraction.log');
        }

        /**
         * Function to get the client IP address
         * @return string
         */
        private function getClientIP()
        {
            $ipaddress = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
            {
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            }
            else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            {
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else if (isset($_SERVER['HTTP_X_FORWARDED']))
            {
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            }
            else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            {
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            }
            else if (isset($_SERVER['HTTP_FORWARDED']))
            {
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            }
            else if (isset($_SERVER['REMOTE_ADDR']))
            {
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            }
            else
            {
                $ipaddress = 'UNKNOWN';
            }
            return $ipaddress;
        }
    }
?>
