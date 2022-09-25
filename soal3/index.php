<?php 

function get_CURL($url)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);
}

$result = get_CURL('http://localhost/pmmb/soal2/api/data.php');
$emp = json_decode(json_encode($result),true);

//JK
$jk = array(
  '0' => $emp['EMP'][0]['JK'],
  '1' => $emp['EMP'][1]['JK'],
  '2' => $emp['EMP'][2]['JK'],
  '3' => $emp['EMP'][3]['JK'],
  '4' => $emp['EMP'][4]['JK'],
  '5' => $emp['EMP'][5]['JK'],
  '6' => $emp['EMP'][6]['JK'],
  '7' => $emp['EMP'][7]['JK'],
  '8' => $emp['EMP'][8]['JK'],
  '9' => $emp['EMP'][9]['JK'],
  '10' => $emp['EMP'][10]['JK']
);

$counterMale = 0;
$counterFemale = 0;

foreach($jk as $e)
{
    if($e == "Male")
    {
        ++$counterMale;
    }
    else if($e == "Female")
    {
        ++$counterFemale;
    }
}

// echo "Male count is ". $counterMale.PHP_EOL;
// echo "Female count is ". $counterFemale;

// $job = $emp['EMP'][0]['DETAIL_JABATAN'];

//graph jk
$dataPoints1 = array( 
	array("label"=>"Male", "y" =>72.72),
	array("label"=>"Female", "y" =>27.28)
);


// Jabatan
$job = array(
  '0' => $emp['EMP'][0]['DETAIL_JABATAN']['DESC'],
  '1' => $emp['EMP'][1]['DETAIL_JABATAN']['DESC'],
  '2' => $emp['EMP'][2]['DETAIL_JABATAN']['DESC'],
  '3' => $emp['EMP'][3]['DETAIL_JABATAN']['DESC'],
  '4' => $emp['EMP'][4]['DETAIL_JABATAN']['DESC'],
  '5' => $emp['EMP'][5]['DETAIL_JABATAN']['DESC'],
  '6' => $emp['EMP'][6]['DETAIL_JABATAN']['DESC'],
  '7' => $emp['EMP'][7]['DETAIL_JABATAN']['DESC'],
  '8' => $emp['EMP'][8]['DETAIL_JABATAN']['DESC'],
  '9' => $emp['EMP'][9]['DETAIL_JABATAN']['DESC'],
  '10' => $emp['EMP'][10]['DETAIL_JABATAN']['DESC'],
);
// print_r($job);
// $counterSuperintendent = 0;
// $counterGM = 0;
// $counterStaffMadyaII = 0;
// $counterStaffUtamaII = 0;
// $counterManager = 0;
// $counterStaffPratamaI = 0;
// $counterSupervisor = 0;

// foreach($job as $j)
// {
//     if($j == "Superintendent")
//     {
//         ++$counterSuperintendent;
//     }
//     else if($j == "General Manager")
//     {
//         ++$counterGM;
//     }
//     else if($j == "Staf Madya II")
//     {
//         ++$counterStaffMadyaII;
//     }
//     else if($j == "Staf Utama II")
//     {
//         ++$counterStaffUtamaII;
//     }
//     else if($j == "Manager")
//     {
//         ++$counterManager;
//     }
//     else if($j == "Staf Pratama I")
//     {
//         ++$counterStaffPratamaI;
//     }
//     else if($j == "Supervisor")
//     {
//       ++$counterSupervisor;
//     }
// }
// echo "Superintendent count is ". $counterSuperintendent. "<br>"; 
// echo "General manager count is ". $counterGM. "<br>";
// echo "Staff Madya II count is ". $counterStaffMadyaII. "<br>";
// echo "Staff Utama count is ". $counterStaffUtamaII. "<br>";
// echo "Manager count is ". $counterManager. "<br>";
// echo "Staff Pratama I count is ". $counterStaffPratamaI. "<br>";
// echo "Supervisor count is ". $counterSupervisor. "<br>";

  
// graph job
$dataPoints2 = array( 
	array("y" => 1, "label" => "Superintendent" ),
	array("y" => 1, "label" => "General manager" ),
	array("y" => 1, "label" => "Staff Madya II" ),
	array("y" => 2, "label" => "Staff Utama" ),
	array("y" => 3, "label" => "Manager" ),
	array("y" => 2, "label" => "Staff Pratama I" ),
	array("y" => 1, "label" => "Supervisor" )
);
 
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My PMMB</title>
  </head>
  <body>
    <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#profile">Esadhira Giovany </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#graph">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#graph">Graph</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- GRAPH -->
    <section class="social bg-light" id="graph">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Employees' Graph</h2>
          </div>
        </div>
        
          <div id="chartContainer1" style="height: 380px; width: 100%; margin-bottom:10px;"></div>
          <div id="chartContainer2" style="height: 380px; width: 100%; margin-top:10px;"></div>
        
        
    </section>  

    <div class="jumbotron" id="profile">
      <div class="container">
        <div class="text-center">
          <img src="img/profile1.png" class="rounded-circle img-thumbnail">
          <h1 class="display-4">Esadhira Giovany </h1>
          <h3 class="lead"> INFORMATIC ENGINEER</h3>
        </div>
      </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <div class="row mb-4">
            <div class="col text-center">
              <p>Halaman Ini dibuat untuk Memenuhi Test Seleksi PMMB 2022 di PT. Pupuk Kujang.
              </p>
            </div>
          </div>
          
        </div>
      </div>
    </section>


   
    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2022.</p>
          </div>
        </div>
      </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>

    <!-- canvasjs -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<!-- GRAPH 1 -->
<script>
window.onload = function() { 

var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
}
 
var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	theme: "light2",
	axisY: {
		title: "Banyak Pegawai"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## Orang",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();
</script>
  </body>
</html>