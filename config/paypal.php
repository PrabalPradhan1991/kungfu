<?php

return [ 
    'client_id' => env('PAYPAL_CLIENT_ID','AW0iHL0it3fhMFb4P3V2QUYkAIR01EAs5M8-orBq1KV1lT7q90ZUPRXa-BQSXTBg9ZqwvZEZuDaTlI6O'),
    'secret' => env('PAYPAL_SECRET','ELauUtNNpEjiiaDZ4NrPmkEb2iJWBtHvm5J-DtB63RPx8lTvBQdDywEJm1Eb9h3WgcTkfDSqACJdeH0V'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];