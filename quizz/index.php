<?php 
require_once 'core/init.php';




	if (isset($_POST['create'])) {
		$quizzName = $_POST['quizzName'];

		$sql = $sql = "CREATE TABLE $quizzName (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			question VARCHAR(190) NOT NULL,
			answer1 VARCHAR(190) NOT NULL,
			answer2 VARCHAR(190) NOT NULL,
			answer3 VARCHAR(190) NOT NULL,
			answer4 VARCHAR(190) NOT NULL
			
)";
		$db -> query($sql);
		echo $quizzName;
		
	} 

	
	
 ?>

 <form action="index.php" method="POST" accept-charset="utf-8">
 	<p>Create new quizz</p>
 	
 </form>