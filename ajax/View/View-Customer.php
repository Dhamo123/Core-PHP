<?php
include '../../core/int.php';
// DB table to use
$table = 'customer';
 
// Table's primary key
$primaryKey = 'customer_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'customer_id', 'dt' => 0 ),
    array( 'db' => 'name', 'dt' => 1 ),
    array( 'db' => 'mobile', 'dt' => 2 ),
    array( 'db' => 'email',     'dt' => 3 )
    
);


 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);