<?php
// страница, указанная в параметре URL, страница по умолчанию - 1 
$page = isset($_GET['page']) ? $_GET['page'] : 1; 

// укажем число записей на странице 
$records_per_page = 5;

// вычисление лимита запроса 
$from_record_num = ($records_per_page * $page) - $records_per_page;
?>