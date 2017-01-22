<?php
if (count($_POST)>0){
	$search=$_POST['search_str'];
	$sort=$_POST['sort'];
	if($sort=="")$sort="sort_autor";
	$type_sort=$_POST['type_sort'];
	if($type_sort=="")$type_sort="SORT_ASK";
}
else{
	$search='';
	$sort='sort_autor';
	$type_sort='SORT_ASK';
}
?>
<div class="col-sm-10">
<form class="form-horizontal" role="form" method="POST">
	<div class="form-group">
	    <label for="search" class="col-sm-4 control-label">Пошук</label>
	    <div class="col-sm-4">
	    	<input type="text" name="search_str" class="form-control" id="search" placeholder="Назва книги" value="<?=$search?>">
	    </div>
	</div>
	<input type="text" id="sort" name="sort" class="hidden" value="<?=$sort?>">
	<input type="text" id="type_sort" name="type_sort" class="hidden" value="<?=$type_sort?>">
	<button type="submit" id="search_button" class="hidden">Отправить</button>
</form>
<table class='table table-hover'>
	<thead>
	<tr>
			<th>#</th>
			<th>Прізвище ім'я автора
				<img id="sort_autor" class="sort" src='img/sort_asc.ico' alt='сортувати'></th>
			<th>Назва книги
				<img id="sort_name_book" class="sort" src='img/sort_asc.ico' alt='сортувати'></th>
			<th>Сторінок
				<img id="sort_pages" class="sort" src='img/sort_asc.ico' alt='сортувати'></th>
			<th>Рік видання
				<img id="sort_year" class="sort" src='img/sort_asc.ico' alt='сортувати'></th>
			<th>Видавництво
				<img id="sort_publication" class="sort" src='img/sort_asc.ico' alt='сортувати'></th>
			<th>Дата надходження
				<img id="sort_date" class="sort" src='img/sort_asc.ico' alt='сортувати'></th>
		  </tr>
	</thead>

<?php  

switch ($sort) {
    case "sort_autor":
        $sort=0;
        break;
    case "sort_name_book":
        $sort=1;
        break;
    case "sort_pages":
        $sort=2;
        break;
    case "sort_year":
        $sort=3;
        break;
    case "sort_publication":
        $sort=4;
        break;
    case "sort_date":
        $sort=5;
        break;
}
	@$db = file("layout/library.lb") or die("<div class='worning';>Фонд бібліотеки скоріш за все порожній!</div>");
	// Output one line until end-of-file
	//print_r($db);
	echo "<tbody>";
	$i=0;
	$volume=array(1);
	$author=array(1);
	foreach ($db as $key => $book) {
		$db[$i++]= explode("=|=", $book);
		$volume[$i-1] = $db[$i-1][$sort];
		$author[$i-1] = $db[$i-1][0];
	}
	$i=1;
	if($type_sort=="SORT_ASK")
	array_multisort($volume,SORT_ASC, $db);
	else 
	array_multisort($volume,SORT_DESC, $db);
	//print_r($db);
	foreach ($db as $book) {
		if ((strripos($book[1], $search)!==false||$search==""))
		echo "<tr>
			<th>".$i++."</th>
			<th><small>$book[0]</small></th>
			<th><small>$book[1]</small></th>
			<th><small>$book[2]</small></th>
			<th><small>$book[3]</small></th>
			<th><small>$book[4]</small></th>
			<th><small>$book[5]</small></th>
		</tr>";
	}
?>
</tbody>
</table>
<?php
echo "<h3><small>Кількість авторів - ".count(array_count_values($author))."</small></h3>";
//print_r($volume);
?>
</div>