<!DOCTYPE html>
<html>

<head>  
<style>

body {
	background-color: aqua;
	padding: 2em;
	font-size: 1.5em;
}

div {
	padding: 2em;
	text-align: center;
}

fieldset {
	padding: 2em;
	text-align: center;
	height: 200%;
	background-color: white;
}

legend {
	font-size: 2em;
	font-family: Casteller;
}

table {
	border: 5px outset black;
	border-radius: 5px;
}

th {
	padding: 1em;
	text-align: center;
	background-color: black;
	color: aqua;
	font-size: 2em;
}

td {
	padding: 10px;
	text-align: center;
	background-color: aqua;
	color: black;
}



</style>

</head>


<body>

<fieldset>

	<?php
		
		include("connect.php");
		//echo "State: ".$_POST['state'];
		$sql = "Select * from names where COL3 = '".$_POST['state']."'"; // get selected state
		$row = ($conn->query($sql))->fetch_assoc();
		
		$index = $row['COL1'];
		$table = $row['COL2'];
		$state = $row['COL3'];
	    echo "<legend>".$state."</legend>";
		//echo $index."--".$table."--".$state."<br><br>";
		
		$sql = "Select * from ".$table;
		$result = $conn->query($sql);
		
		$lc = array();
		$hc = array();
		
		$lc1 = array();		$lcc1=0;
		$lc2 = array();		$lcc2=0;
		$lc3 = array();		$lcc3=0;

		$hc1 = array();		$hcc1=0;
		$hc2 = array();		$hcc2=0;
		$hc3 = array();		$hcc3=0;
		
		$flag=$_POST['flag'];
		
		if ($flag == 1) {
			
			//fetch confiedence for selected state.
		
			if ($result->num_rows > 0) {
				$x = 0;
				while ($row = $result->fetch_assoc()){
					if ($row['COL 1'] == $state && $row['COL 2']!="" && $row['COL 3']!="") {
						$lc[$x++] = $row['COL 2'];
						//$hc[$x] = $row['COL 3'];
							
						//echo $lc[$x++]."<br>";
					}
				}
			}
			
			$arrlength = count($lc);
			$k1 = mt_rand(0,$arrlength);
			$k2 = mt_rand(0,$arrlength);
			$k3 = mt_rand(0,$arrlength);

			//echo $k1."--".$k2."--".$k3."<br><br>";

			
			if ( $lc[$k1] == max($lc[$k1],$lc[$k2],$lc[$k3])) {
				$temp = $k1; $k1 = $k3; $k3 = $temp;
			}
			
			if ( $lc[$k2] == max($lc[$k1],$lc[$k2],$lc[$k3])) {
				$temp = $k2; $k2 = $k3; $k3 = $temp;
			}
			
			if ( $lc[$k1] == max($lc[$k1],$lc[$k2])) {
				$temp = $k1; $k1 = $k2; $k2 = $temp;
			}
			
			//echo $k1."--".$k2."--".$k3."<br><br>";
			
			$newm1 = $lc[$k1];
			$newm2 = $lc[$k2];
			$newm3 = $lc[$k3];
			
			$oldm1 = $lc[$k1];
			$oldm2 = $lc[$k2];
			$oldm3 = $lc[$k3];			
			
			do {
				
				$lf = 0;
				
				$lc1=array();  	$lcc1=0;
				$lc2=array();	$lcc2=0;
				$lc3=array();	$lcc3=0;
				
				$sum1=0;
				$sum2=0;
				$sum3=0;
				
				for($i=0;$i<$arrlength;$i++) {
					$t1=abs($lc[$i]-$newm1);
					$t2=abs($lc[$i]-$newm2);
					$t3=abs($lc[$i]-$newm3);
					
					//echo $lc[$i]."===".$t1."--".$t2."--".$t3."\t";
					
					if ( $t1 == min($t1,$t2,$t3) ) {
						$lc1[$lcc1++] = $lc[$i];
						$sum1 += $lc[$i];
					}
					
					else if ( $t2 == min($t1,$t2,$t3) ){
						$lc2[$lcc2++] = $lc[$i];
						$sum2 += $lc[$i];	
					}
					
					else {
						$lc3[$lcc3++] = $lc[$i];
						$sum3 += $lc[$i];
					}
					
				}
		
				$oldm1 = $newm1;
				$oldm2 = $newm2;
				$oldm3 = $newm3;
				
				$newm1 = $sum1/--$lcc1;
				$newm2 = $sum2/--$lcc2;
				$newm3 = $sum3/--$lcc3;
				
				/*echo $oldm1."--".$newm1."<br>";
				echo $oldm2."--".$newm2."<br>";
				echo $oldm3."--".$newm3."<br>";*/
				
				if($newm1 != $oldm1)
					$lf++;
				if($newm2 != $oldm2)
					$lf++;
				if($newm3 != $oldm3)
					$lf++;
					
					//echo $lf;
			}
	
			while ($lf!=0);
			
		}
		
		if ($flag == 2) {
			
			//fetch confiedence for selected state.
		
			if ($result->num_rows > 0) {
				$x = 0;
				while ($row = $result->fetch_assoc()){
					if ($row['COL 1'] == $state && $row['COL 2']!="" && $row['COL 3']!="") {
						$lc[$x++] = $row['COL 3'];
						//$hc[$x] = $row['COL 3'];
							
						//echo $lc[$x++]."<br>";
					}
				}
			}
			
			$arrlength = count($lc);
			$k1 = mt_rand(0,$arrlength);
			$k2 = mt_rand(0,$arrlength);
			$k3 = mt_rand(0,$arrlength);
			
			if ( $lc[$k1] == max($lc[$k1],$lc[$k2],$lc[$k3])) {
				$temp = $k1; $k1 = $k3; $k3 = $temp;
			}
			
			if ( $lc[$k2] == max($lc[$k1],$lc[$k2],$lc[$k3])) {
				$temp = $k2; $k2 = $k3; $k3 = $temp;
			}
			
			if ( $lc[$k1] == max($lc[$k1],$lc[$k2])) {
				$temp = $k1; $k1 = $k2; $k2 = $temp;
			}
			
			
			$newm1 = $lc[$k1];
			$newm2 = $lc[$k2];
			$newm3 = $lc[$k3];
			
			$oldm1 = $lc[$k1];
			$oldm2 = $lc[$k2];
			$oldm3 = $lc[$k3];			
			
			do {
				
				$lf = 0;
				
				$lc1=array();  	$lcc1=0;
				$lc2=array();	$lcc2=0;
				$lc3=array();	$lcc3=0;
				
				$sum1=0;
				$sum2=0;
				$sum3=0;
				
				for($i=0;$i<$arrlength;$i++) {
					$t1=abs($lc[$i]-$newm1);
					$t2=abs($lc[$i]-$newm2);
					$t3=abs($lc[$i]-$newm3);
					
					//echo $lc[$i]."===".$t1."--".$t2."--".$t3."\t";
					
					if ( $t1 == min($t1,$t2,$t3) ) {
						$lc1[$lcc1++] = $lc[$i];
						$sum1 += $lc[$i];
					}
					
					else if ( $t2 == min($t1,$t2,$t3) ){
						$lc2[$lcc2++] = $lc[$i];
						$sum2 += $lc[$i];	
					}
					
					else {
						$lc3[$lcc3++] = $lc[$i];
						$sum3 += $lc[$i];
					}
					
				}
		
				$oldm1 = $newm1;
				$oldm2 = $newm2;
				$oldm3 = $newm3;
				
				$newm1 = $sum1/--$lcc1;
				$newm2 = $sum2/--$lcc2;
				$newm3 = $sum3/--$lcc3;
				
				/*echo $oldm1."--".$newm1."<br>";
				echo $oldm2."--".$newm2."<br>";
				echo $oldm3."--".$newm3."<br>";*/
				
				if($newm1 != $oldm1)
					$lf++;
				if($newm2 != $oldm2)
					$lf++;
				if($newm3 != $oldm3)
					$lf++;
					
					//echo $lf;
			}
	
			while ($lf!=0);
			
		}
		
		if ($flag == 3) {
			
			//fetch confiedence for selected state.
		
			if ($result->num_rows > 0) {
				$x = 0;
				while ($row = $result->fetch_assoc()){
					if ($row['COL 1'] == $state && $row['COL 2']!="" && $row['COL 3']!="") {
						$lc[$x] = $row['COL 2'];
						$hc[$x++] = $row['COL 3'];
							
						//echo $lc[$x]."--".$hc[$x++]."<br>";
					}
				}
			}
			
			$arrlength = count($lc);
			$k1 = mt_rand(0,$arrlength);
			$k2 = mt_rand(0,$arrlength);
			$k3 = mt_rand(0,$arrlength);
			
			if ( $lc[$k1] == max($lc[$k1],$lc[$k2],$lc[$k3])) {
				$temp = $k1; $k1 = $k3; $k3 = $temp;
			}
			
			if ( $lc[$k2] == max($lc[$k1],$lc[$k2],$lc[$k3])) {
				$temp = $k2; $k2 = $k3; $k3 = $temp;
			}
			
			if ( $lc[$k1] == max($lc[$k1],$lc[$k2])) {
				$temp = $k1; $k1 = $k2; $k2 = $temp;
			}
			
			
			$newml1 = $lc[$k1];		$oldml1 = $lc[$k1];
			$newml2 = $lc[$k2];		$oldml2 = $lc[$k2];
			$newml3 = $lc[$k3];		$oldml3 = $lc[$k3];
			
			$newmh1 = $hc[$k1];		$oldmh1 = $hc[$k1];
			$newmh2 = $hc[$k2];		$oldmh2 = $hc[$k2];
			$newmh3 = $hc[$k3];		$oldmh3 = $hc[$k3];
			
			
			do {
				
				$lf = 0;
				
				$lc1 = array();		$lcc1=0;
				$lc2 = array();		$lcc2=0;
				$lc3 = array();		$lcc3=0;
				
				$hc1 = array();		$hcc1=0;
				$hc2 = array();		$hcc2=0;
				$hc3 = array();		$hcc3=0;
				
				$suml1=0;	$sumh1=0;    
				$suml2=0;	$sumh2=0;
				$suml3=0;	$sumh3=0;
				
				for($i=0;$i<$arrlength;$i++) {
					
					$t1= sqrt(pow($lc[$i]-$newml1,2)+pow($hc[$i]-$newmh1,2));
					$t2= sqrt(pow($lc[$i]-$newml2,2)+pow($hc[$i]-$newmh2,2));
					$t3= sqrt(pow($lc[$i]-$newml3,2)+pow($hc[$i]-$newmh3,2));
					
					//echo $lc[$i]."===".$t1."--".$t2."--".$t3."\t";
					
					if ( $t1 == min($t1,$t2,$t3) ) {
						$lc1[$lcc1++] = $lc[$i];
						$hc1[$hcc1++] = $hc[$i];					
						$suml1 += $lc[$i];
						$sumh1 += $hc[$i];
					}
					
					else if ( $t2 == min($t1,$t2,$t3) ){
						$lc2[$lcc2++] = $lc[$i];
						$hc2[$hcc2++] = $hc[$i];					
						$suml2 += $lc[$i];
						$sumh2 += $hc[$i];	
					}
					
					else {
						$lc3[$lcc3++] = $lc[$i];
						$hc3[$hcc3++] = $hc[$i];					
						$suml3 += $lc[$i];
						$sumh3 += $hc[$i];
					}
					
				}
		
				$oldml1 = $newml1;	$oldmh1 = $newmh1;	
				$oldml2 = $newml2;	$oldmh2 = $newmh2;
				$oldml3 = $newml3;	$oldmh3 = $newmh3;
				
				$newml1 = $suml1/--$lcc1;	$newmh1 = $sumh1/--$hcc1;
				$newml2 = $suml2/--$lcc2;	$newmh2 = $sumh2/--$hcc2;
				$newml3 = $suml3/--$lcc3;	$newmh3 = $sumh3/--$hcc3;
				
				$newm1 = $newml1;	$newm2 = $newml2;	$newm3 = $newml3;
				
				/*echo $oldml1."--".$newml1."***".$oldmh1."--".$newmh1."<br>";
				echo $oldml2."--".$newml2."***".$oldmh2."--".$newmh2."<br>";
				echo $oldml3."--".$newml3."***".$oldmh3."--".$newmh3."<br>";*/
				
				if($newml1 != $oldml1)
					$lf++;
				if($newml2 != $oldml2)
					$lf++;
				if($newml3 != $oldml3)
					$lf++;
				if($newmh1 != $oldmh1)
					$lf++;
				if($newmh2 != $oldmh2)
					$lf++;
				if($newmh3 != $oldmh3)
					$lf++;
				
					//echo $lf;
			}
	
			while ($lf!=0);
			
		}
		
		?>
	
	Sample Size: <?php echo " ".$arrlength."<br><br>"; ?>
	
	<table align="center">
		<tr>
			<th> Cluster </th>
			<th> Mean </th>
			<th> Count </th>
		</tr>
		
		<tr>
			<td> 1 </td>
			<td> <?php if($flag!=3) echo number_format($newm1,2,".",",");
						else	echo "(".number_format($newml1,2,".",",").",".number_format($newmh1,2,".",",").")"; ?>
			<td> <?php echo $lcc1 ?> </td>						
		</tr>
		
		<tr>
			<td> 2 </td>
			<td> <?php if($flag!=3) echo number_format($newm2,2,".",",");
						else	echo "(".number_format($newml2,2,".",",").",".number_format($newmh2,2,".",",").")"; ?>
			<td> <?php echo $lcc2 ?> </td>
		</tr>
		
		<tr>
			<td> 3 </td>
			<td> <?php if($flag!=3) echo number_format($newm3,2,".",",");
						else	echo "(".number_format($newml3,2,".",",").",".number_format($newmh3,2,".",",").")"; ?>
			<td> <?php echo $lcc3 ?> </td>
		</tr>
	</table>
	<br>
	<?php
		$impact = "";
		if( $lcc1 == max($lcc1, $lcc2, $lcc3)) {
			if($newm1 == min($newm1, $newm2, $newm3))
				$impact = "majorly";
			else if($newm1 == max($newm1, $newm2, $newm3))
				$impact = "very slightly";
			else
				$impact = "moderately";
		}
		
		if( $lcc2 == max($lcc1, $lcc2, $lcc3)) {
			if($newm2 == min($newm1, $newm2, $newm3))
				$impact = "majorly";
			else if($newm2 == max($newm1, $newm2, $newm3))
				$impact = "very slightly";
			else
				$impact = "moderately";
		}
		
		if( $lcc3 == max($lcc1, $lcc2, $lcc3)) {
			if($newm3 == min($newm1, $newm2, $newm3))
				$impact = "majorly";
			else if($newm3 == max($newm1, $newm2, $newm3))
				$impact = "very slightly";
			else
				$impact = "moderately";
		}
	?>
	<br>
	<?php
 
		if($flag!=3) {
			$m1 = number_format($newm1,2,".",","); 
			$m2 = number_format($newm2,2,".",",");
			$m3 = number_format($newm3,2,".",",");
		}
		else {
			$m1 = "(".number_format($newml1,2,".",",").",".number_format($newmh1,2,".",",").")";
			$m2 = "(".number_format($newml2,2,".",",").",".number_format($newmh2,2,".",",").")";
			$m3 = "(".number_format($newml3,2,".",",").",".number_format($newmh3,2,".",",").")";
		}
		
		echo "The confidence of majority of people in ".$state." is ".$impact." affected by Obesity.<br><br>";

		include("Chart.php");
	?>
	<br><br><br><br><br><br><br><br><br><br>
</fieldset>	

</body>
</html>