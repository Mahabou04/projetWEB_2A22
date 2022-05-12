<?php
	include '../Controller/reservationC.php';
	$reservationC=new reservationC();
	$liste=$reservationC->statistiquereservations();
    $arrive="";
    $prix="";
    foreach($liste as $keys){
        $arrive.=$keys['arrive'].'/';
        $prix.=$keys['prix'].'/';
    }
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Charts</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" >
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - reservation -->
<li class="nav-item">
    <a class="nav-link" href="afficherReservation.php">
        <i class="fas fa-fw fa-tachometer-alt "  ></i>
        <span> Reservation</span></a>
</li>
 <!-- Nav Item - ticket -->
 <li class="nav-item">
    <a class="nav-link" href="afficherDestination.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Destination</span></a>
</li>
<li class="nav-item">
                <a class="nav-link" href="afficherHotel.php" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span> Hotel</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="afficherReclamationBack.php" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span> Reclamation</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="afficherArticleBack.php" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span> Article</span></a>
            </li>
 <!-- Nav Item - ticket -->
 <li class="nav-item">
    <a class="nav-link">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Statistique</span></a>
</li>


</ul>
<!-- End of Sidebar -->

<div class="container-fluid">

                                <div class="card shadow mb-4">

                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Statistique des arrives</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    
                                    
                                </div>
                            </div>

                        
</div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <!-- <script src="js/sb-admin-2.min.js"></script> -->

    <!-- Page level plugins -->
    <script src="../assets/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script  type="text/javascript">
        function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}
var arrives="<?php echo $arrive; ?>";
var prix="<?php echo $prix; ?>";
// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: arrives.split("/"),
    datasets: [{
      label: "Revenue",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: prix.split('/'),
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: Math.max(...prix.split('/'))+100,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});

    </script>
   

</body>
</html>