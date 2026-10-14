<?php 
	include("serive/samparka.php");
	
	$lockFile = __DIR__ . '/last_run_3min.lock';



// Get current timestamp
$now = time();

// Check if lock file exists
if (file_exists($lockFile)) {
    $lastRun = (int)file_get_contents($lockFile);
    
    if (($now - $lastRun) < 180) {
        // Less than 30 seconds since last run — exit
        exit("Please wait: Only " . ($now - $lastRun) . " seconds passed.\n");
    }
}

// Save current timestamp to lock file
file_put_contents($lockFile, $now);
	include("nayakaphalitansa_mulaka_unohs_drei.php");
	
	$prathama = date('Ymd')."10002".sprintf("%04d",1);
	$sesa = $lastperiodid=date('Ymd')."10002".sprintf("%04d",480);
	
	$ajitarika = date('Ymd');
	$ghanta = date('H');
	$nimisa = $ghanta*60;
	$bartamannimisa = date('i');
	$bartamankalasankhya = ceil(($nimisa+$bartamannimisa) / 3);
	
	$bartamankalakrama = $ajitarika ."10002". sprintf("%04d", $bartamankalasankhya);
	$bartamankalakrama = $bartamankalakrama + 1;
	
	$tarika = date('Y-m-d H:i:s');
	
	$dekhakalakrama = mysqli_query($conn,"select atadaaidi from `gelluonduhogu_drei` order by kramasankhye desc limit 1");
	$kaladhadi = mysqli_num_rows($dekhakalakrama);
	$kalakramadhadi=mysqli_fetch_array($dekhakalakrama);
	
	if($kaladhadi == null){
		$tathya = mysqli_query($conn,"INSERT INTO `gelluonduhogu_drei` (`atadaaidi`,`dinankavannuracisi`) VALUES ('".$bartamankalakrama."','".$tarika."')");
	}
	else if($prathama > $kalakramadhadi['atadaaidi']){
		$katiba=mysqli_query($conn,"TRUNCATE TABLE `gelluonduhogu_drei`");
		//$truncateQuery=mysqli_query($con,"TRUNCATE TABLE `abracadabra`");
		$tathya = mysqli_query($conn,"INSERT INTO `gelluonduhogu_drei` (`atadaaidi`,`dinankavannuracisi`) VALUES ('".$prathama."','".$tarika."')");
	}
	else{
		$parabartikrama = $kalakramadhadi['atadaaidi'] + 1;
		$tathya = mysqli_query($conn,"INSERT INTO `gelluonduhogu_drei` (`atadaaidi`,`dinankavannuracisi`) VALUES ('".$parabartikrama."','".$tarika."')");
	}
	
	$safa_shonu = mysqli_query($conn,"UPDATE hastacalita_phalitansa_drei SET sthiti='0'");
?>