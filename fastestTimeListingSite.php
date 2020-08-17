<!DOCTYPE html>
<html>
    <body>
	<title>Fastest Time | skillinator</title>
	<link rel="stylesheet" href="newFastestTimeStyle.css">
	    <header>
		    <form method="post">
		    <button class="deleteButton" name="deleteButton" type="submit">DELETE EVERYTHING</button>
			
			<?php
			    if(isset($_POST["deleteButton"])){
					$fileNameFinal = "TimeOf" . $_GET["nameID"] . "fastestTimeListingSite.txt";
					$fileC2 = fopen($fileNameFinal, 'w');
					fwrite($fileC2, "");
					fclose($fileC2);
					
					$linkDel = "fastestTimeListingSite.php?nameID=";
					header('Location: ' . $linkDel); exit;
				}
			?>
			</form>
			
			
		</header>
		
		<main>
		    <div class="theActionConatiner">
			    <form method="post">
				    <?php
					    echo '<input name="echoNameOffInput" class="echoNameOffInput" type="text" placeholder="show name times" value="' . $_GET["forOutNameId"] . '">';
					?>
					
					<button name="refreshButton" class="refreshButton" type="submit">.</button></p>
					<p><input type="text" name="timeInput" class="timeInput" placeholder="time">
					
					<?php
					    echo '<input type="text" name="nameInput" class="nameInput" placeholder="name" value="' . $_GET["nameID"] . '"></p>';
					?>
					
					<p><button class="addTimeButton" name="addTimeButton" type="submit">ADD TIME</button></p>
					
				</form>
				
			</div>
			
	
	<?php
	
	    
		if(isset($_POST["refreshButton"])){
			$linkSearch = "fastestTimeListingSite.php?nameID=" . $_GET["nameID"] . "&forOutNameId=" . $_POST["echoNameOffInput"];
			header('Location: ' . $linkSearch); exit;
		}
		
	    #echo "1.: " . $_POST["timeInput"];
		#echo '<br />';
		
		$checkForSemikolonsInInputSPlit = preg_split('/;/', $_POST["timeInput"], -1, PREG_SPLIT_NO_EMPTY);
		$checkForDoppelPunktInInputSPlit = preg_split('/:/', $_POST["timeInput"], -1, PREG_SPLIT_NO_EMPTY);
		if($checkForSemikolonsInInputSPlit[0]!=$_POST["timeInput"] || $checkForDoppelPunktInInputSPlit[0]!=$_POST["timeInput"]){
			goTo Endpart;
		}
		
		
		$checkForSemikolonsInInputNameSPlit = preg_split('/;/', $_POST["nameInput"], -1, PREG_SPLIT_NO_EMPTY);
		$checkForDoppelPunktInInputNameSPlit = preg_split('/:/', $_POST["nameInput"], -1, PREG_SPLIT_NO_EMPTY);
		if($checkForSemikolonsInInputNameSPlit[0]!=$_POST["nameInput"] || $checkForDoppelPunktInInputNameSPlit[0]!=$_POST["nameInput"]){
			goTo Endpart;
		}
	    
		$time = $_POST["timeInput"];
		is_double($time);
		is_double($time2 = $time + 1);
		
		#echo $time;
		
		#echo '<br />';
		#echo "time + 1= " . $time2;
		
		is_int($semikolonsNumber);
		
		if(isset($_POST["addTimeButton"])){
			
			$fileNameFinal = "TimeOf" . $_POST["nameInput"] . "fastestTimeListingSite.txt";
			
			$timebefore = file_get_contents($fileNameFinal);
			$timebeforSplit = preg_split('/;/', $timebefore, -1, PREG_SPLIT_NO_EMPTY);
			
			$splitFileForZeilen = preg_split(PHP_EOL, $timebefore, -1, PREG_SPLIT_NO_EMPTY);
			is_int($zeilenTestNummer = 0);
			
			$splitFileForZeilen = preg_split('/'. PHP_EOL .'/', $timebefore, -1, PREG_SPLIT_NO_EMPTY);
			is_int($zeilenTestNummer = 0);
			
			CheckWieVielZeilen: {
				$zeilenInhalt = $splitFileForZeilen[$zeilenTestNummer];
				#echo $zeilenInhalt;
				
				if($zeilenInhalt!=""){
					is_int($zeilenTestNummer = $zeilenTestNummer + 1);
					goTo CheckWieVielZeilen;
			}
		}
			
			/*echo '<br />';
			echo "Zeilen: " . $zeilenTestNummer;
			echo '<br />';*/
			
			$timebeforeLength = strlen($timebefore);
			is_int($timebeforeLength);
			
			$timebeforSplitEveryLetter = preg_split('//', $timebefore, -1, PREG_SPLIT_NO_EMPTY);
			
			SplitForSemikolons: {
				
				$timebeforeZeichen = $timebeforSplitEveryLetter[$timebeforeLength];
				
				if($timebeforeZeichen==";"){
					is_int($semikolonsNumber = $semikolonsNumber + 1);
				}
				
				if($timebeforeLength>0){
					is_int($timebeforeLength = $timebeforeLength - 1);
					goTo SplitForSemikolons;
				}
			}
			
			#echo "semikolons: " . $semikolonsNumber;
			
			
			is_int($NumberOfTimes = 0);
			
			CheckAndAddTime: {
				$timeZeitCheck = $timebeforSplit[$NumberOfTimes];
				if($timeFinal==""){
					$timeFinal = ";";
				}
				
					is_double($timeZeitCheck);
					if($timeZeitCheck>$time && $NumberOfTimes<=9 && $wasThere == "" || $timeZeitCheck==0 && $NumberOfTimes<=9 && $wasThere == ""){
						
						$wasThere = "no";
						
						$timeZeitCheck = $time . ";" . $timeZeitCheck;
						#is_int($NumberOfTimes = $NumberOfTimes + 1);
						
						
					}
					
					$timeFinal = $timeFinal . $timeZeitCheck . ";";
					
					if($NumberOfTimes<9){
						is_int($NumberOfTimes = $NumberOfTimes + 1);
						goTo CheckAndAddTime;
					}
					
				}
				
				$fileC = fopen($fileNameFinal, 'w');
				fwrite($fileC, $timeFinal);
				fclose($fileC);
				$link = "fastestTimeListingSite.php?nameID=" . $_POST["nameInput"] . "&forOutNameId=" . $_GET["forOutNameId"];
				header('Location: ' . $link); exit;
			}
			
		#}
		
		Endpart: {
			
		}
		
		$namesForShow = $_GET["forOutNameId"];
		
		#echo "namesForEcho: " . $_POST["echoNameOffInput"];
		
		#echo $namesForShow;
		#echo '<br />';
		
		$namesForShowLength = strlen($namesForShow);
		is_int($namesForShowLength);
		
		$namesForShowSplitForEverything = preg_split('//', $namesForShow, -1, PREG_SPLIT_NO_EMPTY);
		
		CheckForKommasInNamesOff: {
			
			$namesOffZeichen = $namesForShowSplitForEverything[$namesForShowLength];
			
			if($namesOffZeichen==","){
				is_int($namesOffNumberOffKommas = $namesOffNumberOffKommas + 1);
			}
			
			if($namesForShowLength>0){
				is_int($namesForShowLength = $namesForShowLength - 1);
				goTo CheckForKommasInNamesOff;
			}
			
		}
		
		is_int($namesOffNumberOffKommas);
		
		$newSplitKommasFinal = preg_split('/,/', $namesForShow, -1, PREG_SPLIT_NO_EMPTY);
		
		#echo "Kommas: " . $namesOffNumberOffKommas;
		
		
		
		
		EchoAllOff: {
		
		
		$nameForHeader = $newSplitKommasFinal[$namesOffNumberOffKommas];
		
		if($namesOffNumberOffKommas==0 && $washere==""){
			$nameForHeader = $namesForShow;
		}
		
		$washere = "ja";
		
		$fileNameFinalOut = "TimeOf" . $nameForHeader . "fastestTimeListingSite.txt";
		
		echo '<h1>' . $nameForHeader . '</h1>';
		
		$timebeforeFinal = file_get_contents($fileNameFinalOut);
		$timebeforFinalSplit = preg_split('/;/', $timebeforeFinal, -1, PREG_SPLIT_NO_EMPTY);
		
		is_int($plazierungsNummer = 0);
		
		EchoPlazierungenAus: {
			
			echo '<br />';
			if($plazierungsNummer!=2 && $plazierungsNummer!=1 && $plazierungsNummer!=0){
				echo '<a class="places">' . $timebeforFinalSplit[$plazierungsNummer] . '</a>';
			}
			if($plazierungsNummer==0){
				echo '<a class="placesFirst">' . $timebeforFinalSplit[$plazierungsNummer] . '</a>';
			}
			
			if($plazierungsNummer==1){
				echo '<a class="placesSecond">' . $timebeforFinalSplit[$plazierungsNummer] . '</a>';
			}
			
			if($plazierungsNummer==2){
				echo '<a class="placesThird">' . $timebeforFinalSplit[$plazierungsNummer] . '</a>';
			}
			
			if($plazierungsNummer<9){
				is_int($plazierungsNummer = $plazierungsNummer + 1);
				goTo EchoPlazierungenAus;
			}
		}
		
		}
		
		$splitFileForZeilen = preg_split('/'. PHP_EOL .'/', $timebeforeFinal, -1, PREG_SPLIT_NO_EMPTY);
		is_int($zeilenTestNummer = 0);
			
		CheckWieVielZeilen2: {
			$zeilenInhalt = $splitFileForZeilen[$zeilenTestNummer];
			#echo $zeilenInhalt;
				
			if($zeilenInhalt!=""){
				is_int($zeilenTestNummer = $zeilenTestNummer + 1);
				goTo CheckWieVielZeilen2;
			}
			
			if($namesOffNumberOffKommas>0){
				is_int($namesOffNumberOffKommas = $namesOffNumberOffKommas - 1);
				goTo EchoAllOff;
			}
		}
		
		echo '<br />';
		#echo "Zeilen: " . $zeilenTestNummer;
		echo '<br />';
		
		
	?>
	
			
		</main>
	</body>
</html>