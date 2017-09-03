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
            error_log($message . "\n", 3, self::$TMP.'user_action.log');
        }

        /**
         * Logs errors
         */
        public static function logError($message)
        {
            error_log($message . "\n", 3, self::$TMP.'errors.log');
        }
    }
?>
