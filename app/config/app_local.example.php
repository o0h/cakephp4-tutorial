<?php
/*
 * Local configuration file to provide any overrides to your app.php configuration.
 * Copy and save this file as app_local.php and make changes as required.
 * Note: It is not recommended to commit files with credentials such as app_local.php
 * into source code version control.
 */

use Cake\Console\ConsoleOutput;
use Cake\Log\Engine\ConsoleLog;
use Cake\Log\Engine\FileLog;

return [
    /*
     * Debug Level:
     *
     * Production Mode:
     * false: No error messages, errors, or warnings shown.
     *
     * Development Mode:
     * true: Errors and warnings shown.
     */
    'debug' => filter_var(env('DEBUG', false), FILTER_VALIDATE_BOOLEAN),

    /*
     * Security and encryption configuration
     *
     * - salt - A random string used in security hashing methods.
     *   The salt value is also used as the encryption key.
     *   You should treat it as extremely sensitive var.
     */
    'Security' => [
        'salt' => env('SECURITY_SALT', '__SALT__'),
    ],

    /*
     * Connection information used by the ORM to connect
     * to your application's datastores.
     *
     * See app.php for more configuration options.
     */
    'Datasources' => [
        'default' => [
            'host' => env('DB_HOST'),
            'username' => env('DB_USER'),
            'password' => env('DB_PASSWORD'),
            'database' => env('DB_NAME'),
        ],

        /*
         * The test connection is used during the test suite.
         */
        'test' => [
            'host' => env('DB_HOST'),
            'username' => env('DB_USER'),
            'password' => env('DB_PASSWORD'),
            'database' => 'test_' . env('DB_NAME'),
        ],
    ],
    /*
     * Configures logging options
     */
    'Log' => [
        'debug' => [
            'className' => ConsoleLog::class,
            'stream' => 'php://stdout',
            'outputAs' => ConsoleOutput::PLAIN,
            'scopes' => false,
            'levels' => ['notice', 'info', 'debug'],
        ],
        'error' => [
            'className' => ConsoleLog::class,
            'stream' => 'php://stderr',
            'outputAs' => ConsoleOutput::PLAIN,
            'scopes' => false,
            'levels' => ['warning', 'error', 'critical', 'alert', 'emergency'],
        ],
        // To enable this dedicated query log, you need set your datasource's log flag to true
        'queries' => [
            'className' => FileLog::class,
            'path' => LOGS,
            'file' => 'queries',
            'url' => env('LOG_QUERIES_URL', null),
            'scopes' => ['queriesLog'],
        ],
    ],


    /*
     * Email configuration.
     *
     * Host and credential configuration in case you are using SmtpTransport
     *
     * See app.php for more configuration options.
     */
    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
];
