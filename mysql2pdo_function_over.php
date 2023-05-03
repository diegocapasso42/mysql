<?php

/**
 * -- mysql2pdo_function_over.php --
 * This library provides a wrapper for PDO functions for interacting with MySQL databases 
 * in projects where the deprecated mysql_* function is still in use in a PHP
 * version that does not declare those functions (>PHP 7.0).
 * It is intended for developers whose projects still use the deprecated mysql_* functions 
 * and should not be considered a definitive solution as it does not resolve many of 
 * the security issues associated with these now-obsolete functions. 
 * Therefore, it is recommended that users consider updating their code using MySQLi or PDO
 * 
 * For more information about each function parameters and return values, see the official
 * PHP documentation at @link
 * 
 * @author      Diego Capasso diego.capasso@protonmail.com
 * @copyright   GPL license 
 * @license     http://www.gnu.org/copyleft/gpl.html 
 * @link        http://www.php.net/manual/en/ref.mysql.php
*/

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mysql2pdo_class.php');
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mysql2pdo_const.php');
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mysql2pdo_exception.php');

/**
 * mysql_add_existing_connection
 * 
 * This is not a standard mysql_* function, but it can be usefull to 
 * add an existing PDO connection
 */
function mysql_add_existing_connection($dbh) {
    return mysql2pdo::getInstance()->mysql_add_existing_connection($dbh);
}
/**
 * mysql_get_connection
 * http://www.php.net/manual/en/function.mysql-connect.php
 * 
 * This is not standard mysql_connect function:
 *  - create a new PDO connection if not exists and return the connection resource
 *  - if the connection resource is passed as parameter, return the connection resource
 */
function mysql_connect($server, $user, $pass, $new_link = false, $client_flags = false) {
    return mysql2pdo::getInstance()->mysql_connect($server, $user, $pass, $new_link, $client_flags);
}
/**
 * mysql_pconnect
 * http://www.php.net/manual/en/function.mysql-pconnect.php
 * 
 * The difference between mysql_connect() and mysql_pconnect() is that mysql_connect()
 * always opens a new connection, while mysql_pconnect() will reuse the same connection
 * if it's already been opened. This means that mysql_pconnect() is slightly faster
 * than mysql_connect(), and has the added benefit that if the user closes all
 * references to a particular connection identifier, any persistent connections
 * associated with that identifier will automatically be closed at the server end.
 */
function mysql_pconnect($server, $user, $pass, $new_link = false, $client_flags = false) {
    return mysql2pdo::getInstance()->mysql_pconnect($server, $user, $pass, $new_link, $client_flags);
}
/**
 * mysql_select_db
 * http://www.php.net/manual/en/function.mysql-select-db.php
 * 
 * Selects a MySQL database to use for queries on the connection specified by res_link.
 * If res_link is not specified, the last opened link is used. 
 */
function mysql_select_db($db_name, $res_link = false) {
    return mysql2pdo::getInstance()->mysql_select_db($db_name, $res_link);
}
// Alias for mysql_select_db()
function mysql_selectdb($db_name, $res_link = false) {
    return mysql2pdo::getInstance()->mysql_select_db($db_name, $res_link);
}
/**
 * mysql_query
 * http://www.php.net/manual/en/function.mysql-query.php
 * 
 * Executes a query on the database that's associated with the specified res_link
 * resource. If res_link is not specified, the last opened link is used.
 */
function mysql_query($query, $res_link = false) {
    return mysql2pdo::getInstance()->mysql_query($query, $res_link);
}

/**
 * mysql_unbuffered_query
 * http://www.php.net/manual/en/function.mysql-unbuffered-query.php
 * 
 * Executes a query on the database that's associated with the specified res_link
 * resource. If res_link is not specified, the last opened link is used.
 * 
 * The difference between mysql_query() and mysql_unbuffered_query() is that
 * mysql_query() buffers the entire result set and mysql_unbuffered_query() does not.
 * This means that mysql_unbuffered_query() has much better performance for large
 * result sets, but the downside is that you can't perform any other queries on the
 * same connection until you have fetched all rows from the result set.
 */
function mysql_unbuffered_query($query, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_unbuffered_query($query, $res_link); 
}


/**
 * mysql_real_escape_string
 * http://www.php.net/manual/en/function.mysql-real-escape-string.php
 * 
 * Escapes special characters in a string for use in an SQL statement, taking into account
 * the current charset of the connection.
 */
function mysql_real_escape_string($string, $res_link = false) {
    return mysql2pdo::getInstance()->mysql_real_escape_string($string, $res_link);
}
// Alias for mysql_real_escape_string()
function mysql_escape_string($string, $res_link = false) {
    return mysql2pdo::getInstance()->mysql_escape_string($string, $res_link);
}
/** 
 * mysql_fetch_array
 * http://www.php.net/manual/en/function.mysql-fetch-array.php
 * 
 * Fetches a result row as an associative array, a numeric array, or both.
 * The type of array that's returned depends on the result_type parameter.
 */
function mysql_fetch_array(&$result, $result_type = MYSQL_BOTH) {
    return mysql2pdo::getInstance()->mysql_fetch_array($result, $result_type);
}
/**
 * mysql_fetch_assoc
 * http://www.php.net/manual/en/function.mysql-fetch-assoc.php
 * 
 * Fetches a result row as an associative array.
 * The array that's returned corresponds to the fetched row and
 * will have the column names as the array keys.
 * 
 */
function mysql_fetch_assoc(&$result) {
    return mysql2pdo::getInstance()->mysql_fetch_assoc($result);
}
/**
 * mysql_fetch_row
 * http://www.php.net/manual/en/function.mysql-fetch-row.php
 * 
 * Fetches a result row as an enumerated array.
 * The array that's returned corresponds to the fetched row and
 * will have the column names as the array keys.
 * 
 */
function mysql_fetch_row(&$result) {
    return mysql2pdo::getInstance()->mysql_fetch_row($result);
}
/**
 * mysql_fetch_object
 * http://www.php.net/manual/en/function.mysql-fetch-object.php
 *  
 * Fetches a result row as an object.
 * The object variables correspond to the fetched row's column names.
 */
function mysql_fetch_object(&$result) {
    return mysql2pdo::getInstance()->mysql_fetch_object($result);
}
/**
 * mysql_ping
 * http://www.php.net/manual/en/function.mysql-ping.php
 * 
 * Pings a server connection, or tries to reconnect if the connection has gone down.
 */
function mysql_ping($res_link = false) {
    return mysql2pdo::getInstance()->mysql_ping($res_link);
}
/** 
 * mysql_num_errno
 * http://www.php.net/manual/en/function.mysql-num-errno.php
 * 
 * Returns the error code for the most recent MySQL function call.
 */
function mysql_errno($res_link = false) {
    return mysql2pdo::getInstance()->mysql_errno($res_link);
}
/** 
 *  mysql_error
 * http://www.php.net/manual/en/function.mysql-error.php
 * 
 * Returns the error text from the last MySQL function call.
 */
function mysql_error($res_link = false) {
    return mysql2pdo::getInstance()->mysql_error($res_link);
}
/**
 * mysql_affect_rows
 * http://www.php.net/manual/en/function.mysql-affect-rows.php
 * 
 * Returns the number of rows affected by the last INSERT, UPDATE, REPLACE or DELETE query.
 */
function mysql_affected_rows($res_link = false) {
    return mysql2pdo::getInstance()->mysql_affected_rows($res_link);
}

/**
 * mysql_num_rows
 * http://www.php.net/manual/en/function.mysql-num-rows.php
 * 
 * Returns the number of rows in a result set.
 * The difference with the original function is that this one:
 * - count($result) if $result is an array
 * - $result->rowCount() if $result is a PDOStatement object
 */
function mysql_num_rows($result) {
    return mysql2pdo::getInstance()->mysql_num_rows($result);
}

/**
 * mysql_client_encoding
 * http://www.php.net/manual/en/function.mysql-client-encoding.php
 * 
 * Returns the default character set for the database connection.
 */
function mysql_client_encoding($res_link = false) {
    return mysql2pdo::getInstance()->mysql_client_encoding($res_link);
}
/**
 * mysql_close
 * http://www.php.net/manual/en/function.mysql-close.php
 * 
 * Closes a previously opened database connection and frees the associated resources.
 * if res_link is not specified, the last opened link is used.
 */
function mysql_close($res_link = false) {
    return mysql2pdo::getInstance()->mysql_close($res_link);
}
/**
 * mysql_create_db
 * http://www.php.net/manual/en/function.mysql-create-db.php
 * 
 * Creates a new database.
 */
function mysql_create_db($db_name, $res_link = false) {
    return mysql2pdo::getInstance()->mysql_create_db($db_name, $res_link);
}
// Alias for mysql_create_db()
function  mysql_createdb($db_name, $res_link = false) {
    return mysql2pdo::getInstance()->mysql_create_db($db_name, $res_link);
}
/**
 * mysql_data_seek
 * http://www.php.net/manual/en/function.mysql-data-seek.php
 * 
 * Moves internal result pointer. 
 * The new result pointer, offset, points to the row specified by the offset parameter.
 */
function mysql_data_seek($result, $row_number) {
    return mysql2pdo::getInstance()->mysql_data_seek($result, $row_number);
}
/**
 * mysql_list_dbs
 * http://www.php.net/manual/en/function.mysql-list-dbs.php
 * 
 * Returns a list of all databases available on a MySQL server.
 */
function mysql_list_dbs($res_link = false) {
    return mysql2pdo::getInstance()->mysql_list_dbs($res_link);
}
// Alias for mysql_list_dbs()
function mysql_listdbs($res_link = false) {
    return mysql2pdo::getInstance()->mysql_list_dbs($res_link);
}

/**
 * mysql_db_name
 * http://www.php.net/manual/en/function.mysql-db-name.php
 * 
 * Returns the name of the specified database.
 */
function mysql_db_name(&$result, $row, $field = 'Database') { 
    return mysql2pdo::getInstance()->mysql_db_name($result, $row, $field); 
}

// Alias for mysql_db_name()
function mysql_dbname(&$result, $row, $field = 'Database') { 
    return mysql2pdo::getInstance()->mysql_db_name($result, $row, $field); 
}

/**
 * mysql_db_query
 * http://www.php.net/manual/en/function.mysql-db-query.php
 * 
 * Selects a database and executes a query on it.
 */
function mysql_db_query($db_name, $query, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_db_query($db_name, $query, $res_link); 
}

/** 
 * mysql_drop_db
 * http://www.php.net/manual/en/function.mysql-drop-db.php
 * 
 * Drops (deletes) a database.
 */
function mysql_drop_db($db_name, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_drop_db($db_name, $res_link); 
}

// Alias for mysql_drop_db()
function  mysql_dropdb($db_name, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_drop_db($db_name, $res_link); 
}

/** 
 * mysql_thread_id
 * http://www.php.net/manual/en/function.mysql-thread-id.php
 * 
 * Returns the thread ID of the current connection.
 * If res_link is not specified, the last opened link is used.
 */
function mysql_thread_id($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_thread_id($res_link); 
}

/**
 * mysql_list_tables
 * http://www.php.net/manual/en/function.mysql-list-tables.php
 * 
 * Returns a list of tables in the current database.
 * If db_name is specified, the list of tables from that database is returned.
 */
function mysql_list_tables($db_name, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_list_tables($db_name, $res_link); 
}

// Alias for mysql_list_tables()
function mysql_listtables($db_name, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_list_tables($db_name, $res_link); 
}

/**
 * mysql_tablename
 * http://www.php.net/manual/en/function.mysql-tablename.php
 * 
 * Returns the name of the specified table.
 * The table name is returned as a string.
 */
function mysql_tablename(&$result, $row) { 
    return mysql2pdo::getInstance()->mysql_tablename($result, $row); 
}

/**
 * mysql_stat
 * http://www.php.net/manual/en/function.mysql-stat.php
 * 
 * Returns the current system status.
 */
function mysql_stat($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_stat($res_link); 
}

/**
 * mysql_set_charset
 * http://www.php.net/manual/en/function.mysql-set-charset.php
 * 
 * Sets the client character set.
 * Returns TRUE on success or FALSE on failure.
 */
function mysql_set_charset($charset, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_set_charset($charset, $res_link); 
}

/**
 * mysql_result
 * http://www.php.net/manual/en/function.mysql-result.php
 * 
 * Returns the contents of one cell from a MySQL result set.
 * The result set must be specified by the result parameter, which is the return value from a call to mysql_query().
 */
function mysql_result(&$result, $rows, $field = false) { 
    return mysql2pdo::getInstance()->mysql_result($result, $rows, $field); 
}

/**
 * mysql_list_processes
 * http://www.php.net/manual/en/function.mysql-list-processes.php
 * 
 * Returns a result set containing the current process list.
 * The result set contains one row for each process.
 * The result set has the following columns:
 * - Id
 * - User
 * - Host
 * - db
 * - Command
 * - Time
 * - State
 * - Info
 */
function mysql_list_processes($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_list_processes($res_link); 
}

/**
 * mysql_insert_id
 * http://www.php.net/manual/en/function.mysql-insert-id.php
 * 
 * Returns the auto generated id used in the last query.
 * If res_link is not specified, the last opened link is used.
 * If no AUTO_INCREMENT value was generated for the previous query, mysql_insert_id() will return zero.
 * */
function mysql_insert_id($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_insert_id($res_link); 
}

/**
 * mysql_get_server_info
 * http://www.php.net/manual/en/function.mysql-get-server-info.php
 * 
 * Returns a string that represents the server version.
 */
function mysql_get_server_info($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_get_server_info($res_link); 
}

/**
 * mysql_get_proto_info
 * http://www.php.net/manual/en/function.mysql-get-proto-info.php
 * 
 * Returns the version of the MySQL protocol used.
 */
function mysql_get_proto_info($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_get_proto_info($res_link); 
}

/**
 * mysql_get_host_info
 * http://www.php.net/manual/en/function.mysql-get-host-info.php
 * 
 * Returns a string that represents the host name or IP address of the MySQL server.
 * If res_link is not specified, the last opened link is used.
 * The string returned by mysql_get_host_info() is in the form host:port.
 * If the port number is not available, the string is in the form host.
 * If the host name is not available, the string is in the form :port.
 * If neither the host name nor the port number is available, the string is empty.
 */
function mysql_get_host_info($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_get_host_info($res_link); 
}

/**
 * mysql_get_client_info
 * http://www.php.net/manual/en/function.mysql-get-client-info.php
 * 
 * Returns a string that represents the client library version.
 */
function mysql_get_client_info($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_get_client_info($res_link); 
}

/**
 * mysql_free_result
 * http://www.php.net/manual/en/function.mysql-free-result.php
 * 
 * Frees the memory associated with the result.
 * Returns TRUE on success or FALSE on failure.
 */
function mysql_free_result(&$result) { 
    return mysql2pdo::getInstance()->mysql_free_result($result); 
}

/**
 * mysql_fetch_lengths
 * http://www.php.net/manual/en/function.mysql-fetch-lengths.php
 * 
 * Returns an array of the lengths of each output in a result set.
 */
function mysql_fetch_lengths(&$result) { 
    return mysql2pdo::getInstance()->mysql_fetch_lengths($result); 
}

/**
 * mysql_list_fields
 * http://www.php.net/manual/en/function.mysql-list-fields.php
 * 
 * Returns a result set containing information about the columns in the specified table.
 * The result set has the following columns:
 * - Field
 * - Type
 * - Null
 * - Key
 * - Default
 * - Extra
 */
function mysql_list_fields($db_name, $table_name, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_list_fields($db_name, $table_name, $res_link); 
}

// Alias for mysql_list_fields()
function mysql_listfields($db_name, $table_name, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_list_fields($db_name, $table_name, $res_link); 
}

/**
 * mysql_field_len
 * http://www.php.net/manual/en/function.mysql-field-len.php
 * 
 * Returns the length of the specified field.
 * The field is specified by the field_offset parameter.
 */
function mysql_field_len(&$result, $field_offset = false) { 
    return mysql2pdo::getInstance()->mysql_field_len($result, $field_offset); 
}

/**
 * mysql_field_flags
 * http://www.php.net/manual/en/function.mysql-field-flags.php
 * 
 * Returns the flags associated with the specified field in a result set.
 * The field is specified by the field_offset parameter.
 * The flags are returned as a string.
 * The following flags are returned:
 * - not_null
 * - primary_key
 * - unique_key
 * - multiple_key
 * - blob
 * - unsigned
 * - zerofill
 * - binary
 * - enum
 * - auto_increment
 */
function mysql_field_flags(&$result, $field_offset = false) { 
    return mysql2pdo::getInstance()->mysql_field_flags($result, $field_offset); 
}

/**
 * mysql_field_name
 * http://www.php.net/manual/en/function.mysql-field-name.php
 * 
 * Returns the name of the specified field in a result set.
 * The field is specified by the field_offset parameter.
 * The name is returned as a string.
 */
function mysql_field_name(&$result, $field_offset = false) { 
    return mysql2pdo::getInstance()->mysql_field_name($result, $field_offset); 
}

// Alias for mysql_field_name()
function mysql_fieldname(&$result, $field_offset = false) { 
    return mysql2pdo::getInstance()->mysql_field_name($result, $field_offset); 
}

