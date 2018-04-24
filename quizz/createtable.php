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

 
if (isset($_POST['submit'])){
	if (isset($_POST['choice1']) && isset($_POST['choice2']) && isset($_POST['choice3']) && isset($_POST['choice4']) && isset($_POST['question']) && !empty($_POST['choice1']) && !empty($_POST['choice2']) && !empty($_POST['choice3']) && !empty($_POST['choice4']) && !empty($_POST['question'])) {
		$question = $_POST['question'];
		$choice1 = $_POST['choice1'];
		$choice2 = $_POST['choice2'];
		$choice3 = $_POST['choice3'];
		$choice4 = $_POST['choice4'];
		$sqltables = "SHOW TABLES";
		$tableResult =  $db -> query($sqltables);
		$tables = mysqli_fetch_row($tableResult);
		var_dump($tables[0]);
		var_dump($question);
		$sqlInsert = "INSERT INTO $tables[0] (question, answer1, answer2, answer3, answer4) VALUES ('$question', '$choice1', '$choice2', '$choice3', '$choice4')";
		
		$db -> query($sqlInsert);


		
	} 


	else echo "შეავსეთ ყველა ველი!"; 
	
} 
	$sqlLasttables = "SHOW TABLES";
	$lastTableResult =  $db -> query($sqlLasttables);
		$lastTable = mysqli_fetch_row($lastTableResult);
		var_dump($lastTable[0]);
		

	$sqlquestions = "SELECT * FROM $lastTable[0]";
	$questionResult = $db -> query($sqlquestions);
	



?>
<h1>Create a Qizz</h1>

<form action="createtable.php" method="post" accept-charset="utf-8">
	<input type="text" name="quizzName" value="" placeholder="<?php echo $quizzName ?>">
 	<input type="hidden" name="create" value="">
 	<input type="submit" name="" value="Create">	
	<input type="text" name="question" placeholder="question here">
	<input type="text" name="choice1">
	<input type="text" name="choice2">
	<input type="text" name="choice3">
	<input type="text" name="choice4">
	<input type="hidden" name="submit" value="">
	<input type="submit" name="" value="Submit">
</form>


<thead>
      <tr>
        <th>Question</th>
        <th>choise1</th>
        <th>choise2</th>
        <th>choise3</th>
        <th>choise4</th>
      </tr>
</thead>

<tbody>
	<?php while ($questionArray = mysqli_fetch_assoc($questionResult)):  ?> <br>
	<tr>
		<td><?php echo $questionArray['question']  ?></td>
		<td><?php echo $questionArray['answer1']  ?></td>
		<td><?php echo $questionArray['answer2']  ?></td>
		<td><?php echo $questionArray['answer3']  ?></td>
		<td><?php echo $questionArray['answer4']  ?></td>
	</tr>
<?php endwhile ?>
</tbody>
