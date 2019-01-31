<ol>
<?php
for($i=1;$i<=10;$i++){
	echo "<li>Table de $i";
	echo "<ul>";
	for($j=0;$j<=10;$j++){
		echo "<li>";
		echo $i."x".$j." = ".$i*$j;
		echo "</li>";
	}
	echo "</ul>";
	echo "</li>";
}
?>
</ol>
