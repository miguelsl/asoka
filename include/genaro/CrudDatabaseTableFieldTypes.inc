<?php

# a map of the database field types to their java field types

$field_types_map = array( 
                          //'blob'    => 'Object' ,
                          'date'    => 'gvHidraDate',
                          'integer' => 'gvHidraInteger',
						  'decimal' => 'gvHidraFloat',
						  'serial' => 'gvHidraInteger',
						  'float' => 'gvHidraFloat',
						  'double' => 'gvHidraDouble',
                          'text'    => 'gvHidraString',
                          'timestamp' => 'gvHidraDatetime'
);

?>

