<div class="col-sm-7 col-sm-offset-1">
<?php 
// include '../../config.php';
// require '../Slim/Slim.php';
// \Slim\Slim::registerAutoloader();

// $app = new \Slim\Slim();

// $app -> config('debug',true);
//echo date('Y:m:d');
	if(count($_POST) > 0){
		$author_name = trim($_POST['author_name']);
		$book_name = trim($_POST['book_name']);
		$pages=$_POST['pages'];
		$year=$_POST['year'];
		$publication = trim($_POST['publication']);
		$date=$_POST['date'];
		$author_name = htmlentities($author_name);
		$book_name = htmlentities($book_name);
		$publication = htmlentities($publication);
		$correct=true;
		$author_name_msg="";
		$book_name_msg="";
		$pages_msg="";
		$year_msg="";
		$publication_msg="";
		$date_msg="";
		// print_r ($_GET);	
		if($author_name==""){$author_name_msg="*Обовязкове поле!";$correct=false;}
		if(count(preg_split("/[\s,.?!]+/", $author_name))>9)$author_name_msg="Якісь дивні автори, мабуть з мексики!";
		if($book_name==""){$book_name_msg="*Обовязкове поле!";$correct=false;}
		if(count(preg_split("/[\s,.?!]+/", $book_name))>10)$book_name_msg="Не переписуйте форзац! Коротша назва!";
		if($pages==""){$pages_msg="*Обовязкове поле!";$correct=false;}
		if($pages<0) {$pages_msg="*Не правильна кількість сторінок!";$correct=false;}
		if($year==""){$year_msg="*Обовязкове поле!";$correct=false;}
		if($year>date('Y')){$year_msg="*Книга з майбутнього?!";$correct=false;}
		if($year<0)$year_msg="Книга точно з минулої ери!?";
		if($publication==""){$publication_msg="*Обовязкове поле!";$correct=false;}
		if($date==""){$date_msg="*Обовязкове поле!";$correct=false;}
		if($date>date('Y-m-d')){$date_msg="*Не можна отримувати книги у майбутньому!";$correct=false;}
		if($correct){
			@$myfile = fopen("layout/library.lb", "a") or die("<div class='worning';>Помилка запису спробуйте пізніше!</div>");
			fwrite($myfile, $author_name."=|=".$book_name."=|=".$pages."=|=".$year."=|=".$publication."=|=".$date."\n");
			fclose($myfile);
			$author_name="";
			$book_name="";
			$pages="";
			$year="";
			$publication="";
			$date="";
			$author_name_msg="";
			$book_name_msg="";
			$pages_msg="";
			$year_msg="";
			$publication_msg="";
			$date_msg="";
		}
	}
	else{
		$author_name="";
		$book_name="";
		$pages="";
		$year="";
		$publication="";
		$date="";
		$author_name_msg="";
		$book_name_msg="";
		$pages_msg="";
		$year_msg="";
		$publication_msg="";
		$date_msg="";
	}
 ?>
<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
	<h2>Нова книга</h2> 
	</div>
</div>
<form class="form-horizontal" role="form" method="POST">
	<div class="form-group">
	    <label for="author_name" class="col-sm-4 control-label">Прізвище та ім'я автора</label>
	    <div class="col-sm-4">
	    	<input type="text" name="author_name" class="form-control" id="author_name" placeholder="Прізвище Ім'я" value="<?=$author_name?>">
	    </div>
	    <div class="col-sm-4 worning">
	    	<?php echo $author_name_msg?>	
	    </div>
	</div>

	<div class="form-group">
	    <label for="book_name" class="col-sm-4 control-label">Назва книги</label>
	    <div class="col-sm-4">
	    	<input type="text" name="book_name" class="form-control" id="book_name" placeholder="Назва книги" value="<?=$book_name?>">
	    </div>
	    <div class="col-sm-4 worning">
	    	<?php echo $book_name_msg?>	
	    </div>
	</div>

	<div class="form-group">
	    <label for="pages" class="col-sm-4 control-label">Кількість сторінок</label>
	    <div class="col-sm-2">
	    	<input type="number" name="pages" class="form-control" id="pages" placeholder="ст." value="<?=$pages?>">
	    </div>
	    <div class="col-sm-4 worning">
	    	<?php echo $pages_msg?>	
	    </div>
	</div>

	<div class="form-group">
	    <label for="year" class="col-sm-4 control-label">Рік видання</label>
	    <div class="col-sm-2">
	    	<input type="number" name="year" class="form-control" id="year" placeholder="Рік вид" value="<?=$year?>">
	    </div>
	    <div class="col-sm-4 worning">
	    	<?php echo $year_msg?>	
	    </div>
	</div>

	<div class="form-group">
	    <label for="publication" class="col-sm-4 control-label">Видавництво</label>
	    <div class="col-sm-4">
	    	<input type="text" name="publication" class="form-control" id="publication" placeholder="Видавництво" value="<?=$publication?>">
	    </div>
	    <div class="col-sm-4 worning">
	    	<?php echo $publication_msg?>	
	    </div>
	</div>

	<div class="form-group">
	    <label for="date" class="col-sm-4 control-label">Дата надходження</label>
	    <div class="col-sm-4">
	    	<input type="date" name="date" class="form-control" id="date" value="<?=$date?>">
	    </div>
	    <div class="col-sm-4 worning">
	    	<?php echo $date_msg?>	
	    </div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-10">
	    	<input type="submit" class="btn btn-default" value="Надіслати">
		</div>
	</div>
</form>
</div>