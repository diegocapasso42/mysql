<?php

/**
 * -- mysql2pdo_const.php --
 * This library defines constants required for using mysql_* functions with PHP versions greater than 7.0. 
 * If the constants have not been defined previously, they will be defined by this library. 
 *
 * This library assumes that the user has a working knowledge of PHP and MySQL, and is aware of the limitations
 * and security risks associated with using the mysql_* functions. We recommend that users consider switching to
 * MySQLi or PDO for improved functionality and security.
 * @author      Diego Capasso diego.capasso@protonmail.com
 * @copyright   GPL license 
 * @license     http://www.gnu.org/copyleft/gpl.html 
 * @link        http://www.php.net/manual/en/ref.mysql.php
*/

if (!defined('MYSQL_ASSOC')) {
// MYSQL_CLIENT options
define('MYSQL_CLIENT_LONG_PASSWORD', 1);  // Use the longer password packet
define('MYSQL_CLIENT_FOUND_ROWS', 2);  // Return number of matching rows instead of number of changed rows
define('MYSQL_CLIENT_LONG_FLAG', 4);  // Use the protocol 4.1-long flag
define('MYSQL_CLIENT_CONNECT_WITH_DB', 8);  // Use the database in the connection
define('MYSQL_CLIENT_NO_SCHEMA', 16);  // Don't allow database.table.column
define('MYSQL_CLIENT_COMPRESS', 32);  // Use compression protocol
define('MYSQL_CLIENT_ODBC', 64);  // Use ODBC escape sequence syntax
define('MYSQL_CLIENT_LOCAL_FILES', 128);  // Can use LOAD DATA LOCAL
define('MYSQL_CLIENT_IGNORE_SPACE', 256);  // Ignore spaces before '('
define('MYSQL_CLIENT_PROTOCOL', 512);  // Use the 4.1 protocol
define('MYSQL_CLIENT_INTERACTIVE', 1024);  // Allow interactive_timeout seconds (instead of wait_timeout) of inactivity before closing the connection
define('MYSQL_CLIENT_SSL', 2048);  // Use SSL encryption. This flag is only available with version 4.0 or newer servers
define('MYSQL_CLIENT_IGNORE_SIGPIPE', 4096);  // Ignore SIGPIPE signals
define('MYSQL_CLIENT_TRANSACTIONS', 8192);  // Client knows about transactions
define('MYSQL_CLIENT_RESERVED', 16384);  // Unused
define('MYSQL_CLIENT_SECURE_CONNECTION', 32768);  // Use SSL
define('MYSQL_CLIENT_MULTI_STATEMENTS', 65535);  // Enable/disable multi-stmt support
define('MYSQL_CLIENT_MULTI_RESULTS', 131072);  // Enable/disable multi-results
define('MYSQL_CLIENT_REMEMBER_OPTIONS', 1 << 31);  // Remember options and relay them to new connections

// MYSQL result type options
define('MYSQL_ASSOC', 1);  // Columns are returned in the associative array form
define('MYSQL_NUM', 2);  // Columns are returned in the numeric array form
define('MYSQL_BOTH', 3);  // Columns are returned in both associative and numeric array forms
}
