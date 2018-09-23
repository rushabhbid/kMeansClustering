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

#sub {
	border: 5px outset black;
	border-radius: 9px;
	background-color: black;
	color: aqua;
	font-size: 2em;
	padding: 9px;
}

select {
	border: 2px outset black;
	border-radius: 5px;
	padding: 5px;
	text-align: center;
	background-color: aqua;
	color: black;
	font-size: 1.5em;
}

@keyframes click-wave {
  0% {
    height: 40px;
    width: 40px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    height: 200px;
    width: 200px;
    margin-left: -80px;
    margin-top: -80px;
    opacity: 0;
  }
}

.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top: 13.33333px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 40px;
  width: 40px;
  transition: all 0.15s ease-out 0s;
  background: #cbd1d8;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
  z-index: 1000;
}
.option-input:hover {
  background: #9faab7;
}
.option-input:checked {
  background: #40e0d0;
}
.option-input:checked::before {
  height: 40px;
  width: 40px;
  position: absolute;
  content: '✔';
  display: inline-block;
  font-size: 26.66667px;
  text-align: center;
  line-height: 40px;
}
.option-input:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background: #40e0d0;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}
.option-input:hover {
  background: #9faab7;
}

.option-input {
  border-radius: 50%;
}
.option-input::after {
  border-radius: 50%;
  padding: 1px;
  backgroud:black;
}

</style>

</head>

<body>
	<form method = "POST" action = "conf.php">
		<fieldset>
			
			<legend> Obesity Based Confidence Analysis: </legend>
			<br>Select State:
			<select name = "state">
			
				<?php 
					
					include("connect.php");
					
					$sql = "SELECT * FROM names";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<option name = '".$row['COL2']."' value = '".$row['COL3']."'> ".$row['COL3']."</option>";
						}
					}
					
					$conn->close();
					
				?>
			
			</select>
			
			<br><br>
			
			Consider:
			&ensp;&ensp;&ensp;Low Confidence Value <input type = "radio" class = "option-input" name = "flag" value = "1">&ensp;&ensp;&ensp;
			&ensp;&ensp;&ensp;High Confidence Value <input type = "radio" class = "option-input" name = "flag" value = "2">&ensp;&ensp;&ensp;
			&ensp;&ensp;&ensp;Both <input type = "radio" class = "option-input radio" name = "flag" value = "3">&ensp;&ensp;&ensp;
			
			<br><br><br><br>
			<input type = "submit" id = "sub" name = "submit" value = "Evaluate">
			
		</fieldset>
	</form>
</body>
</html>
