<?php
    final class Logger
    {
        private const __ROOT__ = '../';
        private const __TMP__ = self::__ROOT__.'tmp/';

        /**
         * Logs a user action
         */
        public static function logAction($message)
        {
            error_log($message . '\n', 3, self::__TMP__.'user_action.log');
        }

        /**
         * Logs errors
         */
        public static function logError($message)
        {
            error_log($message . '\n', 3, self::__TMP__.'errors.log');
        }
    }
?>
