<?php
return array(

    'client_id' => 'AWdLJTIMQ_FGC9uGHxtUjBNnNMaREa5aOsHuu-l-w8WPUL6MkRTqcw5hpVmsOSRsbtl3oCc3zUH6_ZHk',
    'secret' => 'EOGubOL4lstqtiHN2cwLtaAsnUcCSwH5FBK0zcL-k2Pg-29nxpLWzMVXExVqtBfnsKQHjZk0Cd2V-LoX',

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);
