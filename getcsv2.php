<?php
	$row = 0;
	$filename = "csv/1.csv";


	if(!file_exists($filename) || !is_readable($filename))
		return FALSE;
	
	$header = NULL;
	$data = array();
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		echo '<table border=1>';
		echo '<tr><td>Name</td><td>Val</td><tr/>';
		while (($row = fgetcsv($handle, 1000, ';')) !== FALSE)
		{
			if(!$header)
				$header = $row;
			else{
				$data[] = array_combine($header, $row);
				echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><tr/>';
			}
		}
		echo '</table>';
		fclose($handle);
	}
	$size=sizeof($data);
	echo '<br/><br/><br/>';
	echo '<table border=1>';
	echo '<tr><td>Name</td><td>Val</td><tr/>';
	for($i=0;$i<$size;$i++){
		echo '<tr>';
		foreach($data[$i] as $ColKey => $Col) 
			echo '<td>' . $Col . '</td>';
		echo '</tr>';
	}
	echo '</table>';

?>