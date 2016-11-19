<?php

namespace GraftPHP\Clout;

Class Yield
{

}

// SELECT
// 	*,
// 	GROUP_CONCAT(IF(d.field = 3,string_data,NULL)) AS a,
// 	GROUP_CONCAT(IF(d.field = 4,date_data,NULL)) AS b
// FROM
// 	clout_record r
// LEFT JOIN clout_data d ON d.record = r.id
