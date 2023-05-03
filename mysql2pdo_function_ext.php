<?php

/**
 * This file is responsible for converting mysql_* functions 
 * to work with our object without duplicating documentation. 
 * Please refer to the function links for parameter details. 
 * Any custom parameters or changes will be specified. 
 * If the DB resource link is not passed, it will assume subscript 0, 
 * where X is an integer that identify the db connection.
 * 
 * @author      Diego Capasso diego.capasso@protonmail.com
 * @copyright   GPL license 
 * @license     http://www.gnu.org/copyleft/gpl.html 
 * @link        http://www.php.net/manual/en/ref.mysql.php
*/

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mysql2pdo_class.php');
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mysql2pdo_const.php');
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mysql2pdo_exception.php');

// Custom function to add existing connections - See README.md
function mysql2pdo_add_existing_connection($dbh) {
    return mysql2pdo::getInstance()->mysql_add_existing_connection($dbh);
}
// Connect to MySQL database
function mysql2pdo_connect($server, $user, $pass, $new_link = false, $client_flags = false) {
    return mysql2pdo::getInstance()->mysql_connect($server, $user, $pass, $new_link, $client_flags);
}
// Connect to MySQL database (persistent)
function mysql2pdo_pconnect($server, $user, $pass, $new_link = false, $client_flags = false) {
    return mysql2pdo::getInstance()->mysql_pconnect($server, $user, $pass, $new_link, $client_flags);
}
// Select MySQL database to work with
function mysql2pdo_select_db($db_name, $res_link = false) {
    return mysql2pdo::getInstance()->mysql_select_db($db_name, $res_link);
}
// Alias for mysql_select_db()
function mysql2pdo_selectdb($db_name, $res_link = false) {
    return mysql2pdo::getInstance()->mysql_select_db($db_name, $res_link);
}
// Send a MySQL query
function mysql2pdo_query($query, $res_link = false) {
    return mysql2pdo::getInstance()->mysql_query($query, $res_link);
}

// Escapes special characters in a string for use in a SQL statement
function mysql2pdo_real_escape_string($string, $res_link = false) {
    return mysql2pdo::getInstance()->mysql_real_escape_string($string, $res_link);
}
// Alias for mysql_real_escape_string()
function mysql2pdo_escape_string($string, $res_link = false) {
    return mysql2pdo::getInstance()->mysql_escape_string($string, $res_link);
}
// Fetches a result row as an associative array, a numeric array, or both
function mysql2pdo_fetch_array(&$result, $result_type = MYSQL_BOTH) {
    return mysql2pdo::getInstance()->mysql_fetch_array($result, $result_type);
}
// Fetches a result row as an associative array
function mysql2pdo_fetch_assoc(&$result) {
    return mysql2pdo::getInstance()->mysql_fetch_assoc($result);
}
// Fetches a result row as a numeric array
function mysql2pdo_fetch_row(&$result) {
    return mysql2pdo::getInstance()->mysql_fetch_row($result);
}
// Fetches a result row as an object
function mysql2pdo_fetch_object(&$result) {
    return mysql2pdo::getInstance()->mysql_fetch_object($result);
}
// Pings a server connection, or tries to reconnect if the connection has gone down
function mysql2pdo_ping($res_link = false) {
    return mysql2pdo::getInstance()->mysql_ping($res_link);
}
// Returns the error code for the most recent MySQL function call
function mysql2pdo_errno($res_link = false) {
    return mysql2pdo::getInstance()->mysql_errno($res_link);
}
// Returns the error message for the most recent MySQL function call
function mysql2pdo_error($res_link = false) {
    return mysql2pdo::getInstance()->mysql_error($res_link);
}
// Get the number of affected rows in a previous MySQL operation
function mysql2pdo_affected_rows($res_link = false) {
    return mysql2pdo::getInstance()->mysql_affected_rows($res_link);
}

// Get the number of rows in a previous SELECT operation
function mysql2pdo_num_rows($result) {
    return mysql2pdo::getInstance()->mysql_num_rows($result);
}

// Returns the name of the character set in use for the current connection
function mysql2pdo_client_encoding($res_link = false) {
    return mysql2pdo::getInstance()->mysql_client_encoding($res_link);
}
// Closes a previously opened database connection
function mysql2pdo_close($res_link = false) {
    return mysql2pdo::getInstance()->mysql_close($res_link);
}
// Creates a new MySQL database
function mysql2pdo_create_db($db_name, $res_link = false) {
    return mysql2pdo::getInstance()->mysql_create_db($db_name, $res_link);
}
// Alias for mysql_create_db()
function  mysql_createdb($db_name, $res_link = false) {
    return mysql2pdo::getInstance()->mysql_create_db($db_name, $res_link);
}
// Move internal result pointer in a result set
function mysql2pdo_data_seek($result, $row_number) {
    return mysql2pdo::getInstance()->mysql_data_seek($result, $row_number);
}
// List databases available on a MySQL server
function mysql2pdo_list_dbs($res_link = false) {
    return mysql2pdo::getInstance()->mysql_list_dbs($res_link);
}
// Alias for mysql_list_dbs()
function mysql2pdo_listdbs($res_link = false) {
    return mysql2pdo::getInstance()->mysql_list_dbs($res_link);
}

// Returns the name of the specified database in the current result set
function mysql2pdo_db_name(&$result, $row, $field = 'Database') { 
    return mysql2pdo::getInstance()->mysql_db_name($result, $row, $field); 
}

// Alias for mysql_db_name()
function mysql2pdo_dbname(&$result, $row, $field = 'Database') { 
    return mysql2pdo::getInstance()->mysql_db_name($result, $row, $field); 
}

// Selects database and runs a query on it
function mysql2pdo_db_query($db_name, $query, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_db_query($db_name, $query, $res_link); 
}

// Drops the specified database
function mysql2pdo_drop_db($db_name, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_drop_db($db_name, $res_link); 
}

// Alias for mysql_drop_db()
function  mysql_dropdb($db_name, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_drop_db($db_name, $res_link); 
}

// Sends an SQL query to MySQL, with the ability to handle large result sets
function mysql2pdo_unbuffered_query($query, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_unbuffered_query($query, $res_link); 
}

// Returns the thread ID for the current connection
function mysql2pdo_thread_id($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_thread_id($res_link); 
}

// Lists tables in a MySQL database
function mysql2pdo_list_tables($db_name, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_list_tables($db_name, $res_link); 
}

// Alias for mysql_list_tables()
function mysql2pdo_listtables($db_name, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_list_tables($db_name, $res_link); 
}

// Returns the name of the table that corresponds to the specified result set row
function mysql2pdo_table_name(&$result, $row) { 
    return mysql2pdo::getInstance()->mysql_tablename($result, $row); 
}

// Returns the current system status
function mysql2pdo_stat($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_stat($res_link); 
}

// Sets the default client character set
function mysql2pdo_set_charset($charset, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_set_charset($charset, $res_link); 
}

// Fetches a result row as an associative, numeric, or both
function mysql2pdo_result(&$result, $rows, $field = false) { 
    return mysql2pdo::getInstance()->mysql_result($result, $rows, $field); 
}

// Lists all currently executing MySQL queries and their process IDs
function mysql2pdo_list_processes($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_list_processes($res_link); 
}

// Returns the ID generated by the previous INSERT operation
function mysql2pdo_insert_id($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_insert_id($res_link); 
}

// Returns the version of the MySQL server
function mysql2pdo_get_server_info($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_get_server_info($res_link); 
}

// Returns the MySQL protocol version
function mysql2pdo_get_proto_info($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_get_proto_info($res_link); 
}

// Returns the host name and information about the connection
function mysql2pdo_get_host_info($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_get_host_info($res_link); 
}

// Returns a string representing the client library version
function mysql2pdo_get_client_info($res_link = false) { 
    return mysql2pdo::getInstance()->mysql_get_client_info($res_link); 
}

// Frees memory used by a result set
function mysql2pdo_free_result(&$result) { 
    return mysql2pdo::getInstance()->mysql_free_result($result); 
}

// Returns the length of each character in the specified result set field
function mysql2pdo_fetch_lengths(&$result) { 
    return mysql2pdo::getInstance()->mysql_fetch_lengths($result); 
}

// Lists fields and their properties for a specified table in a MySQL database
function mysql2pdo_list_fields($db_name, $table_name, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_list_fields($db_name, $table_name, $res_link); 
}

// Alias for mysql_list_fields()

function mysql2pdo_listfields($db_name, $table_name, $res_link = false) { 
    return mysql2pdo::getInstance()->mysql_list_fields($db_name, $table_name, $res_link); 
}

// Returns the length of the specified field in the specified result set
function mysql2pdo_field_len(&$result, $field_offset = false) { 
    return mysql2pdo::getInstance()->mysql_field_len($result, $field_offset); 
}

// Returns the flags for the specified field in the specified result set
function mysql2pdo_field_flags(&$result, $field_offset = false) { 
    return mysql2pdo::getInstance()->mysql_field_flags($result, $field_offset); 
}

// Returns the name of the specified field in the specified result set
function mysql2pdo_field_name(&$result, $field_offset = false) { 
    return mysql2pdo::getInstance()->mysql_field_name($result, $field_offset); 
}

// Alias for mysql_field_name()
function mysql2pdo_fieldname(&$result, $field_offset = false) { 
    return mysql2pdo::getInstance()->mysql_field_name($result, $field_offset); 
}

