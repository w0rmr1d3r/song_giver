<?php
    final class Logger
    {
        /* @var string Constant root directory path */
        private const __ROOT__ = '../';

        /* @var string Constant tmp directory path */
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
