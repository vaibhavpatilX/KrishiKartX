<?php 
session_start();
include("../conn.php");


if(isset($_SESSION['admin'])){
  $FarmerId=$_SESSION['admin'];
}else{
  ?>
  <script>window.location.href = "../adminLogin.php";</script>
<?php  
}

// Initialize variables to store data
$totalOrders = 0;
$PendingOrders = 0;
$DeliveredOrders = 0;
$CanceledOrder = 0;
$TotalIncome = 0;
$QrIncome = 0;
$Razorpay = 0;
$totalSale=0;
// Retrieve data from the database
$sql_total = "SELECT * FROM `order`";
$result_total = $conn->query($sql_total);
$totalOrders = $result_total->num_rows;

$sql_pending = "SELECT * FROM `order` WHERE  OrderStatus='Pending'";
$result_pending = $conn->query($sql_pending);
$PendingOrders = $result_pending->num_rows;

$sql_delivered = "SELECT * FROM `order` WHERE  OrderStatus='Delivered'";
$result_delivered = $conn->query($sql_delivered);
$DeliveredOrders = $result_delivered->num_rows;

$sql_canceled = "SELECT * FROM `order` WHERE  OrderStatus='Canceled'";
$result_canceled = $conn->query($sql_canceled);
$CanceledOrder = $result_canceled->num_rows;

$sql_income = "SELECT SUM(TotalBill) AS TotalIncome FROM `order` WHERE  PaymentStatus='Done'";
$result_income = $conn->query($sql_income);
if ($result_income->num_rows > 0) {
    $row_income = $result_income->fetch_assoc();
    $TotalIncome = $row_income['TotalIncome'];
}

$sql_qr = "SELECT SUM(TotalBill) AS QrIncome FROM `order` WHERE  PaymentMethod='Qr Code' AND PaymentStatus='Done'";
$result_qr = $conn->query($sql_qr);
if ($result_qr->num_rows > 0) {
    $row_qr = $result_qr->fetch_assoc();
    $QrIncome = $row_qr['QrIncome'];
}

$sql_razorpay = "SELECT SUM(TotalBill) AS Razorpay FROM `order` WHERE  PaymentMethod='Razorpay' AND PaymentStatus='Done'";
$result_razorpay = $conn->query($sql_razorpay);
if ($result_razorpay->num_rows > 0) {
    $row_razorpay = $result_razorpay->fetch_assoc();
    $Razorpay = $row_razorpay['Razorpay'];
}

$totalSale=$PendingOrders+$DeliveredOrders;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Graph Report</title>
  <link rel="stylesheet" href="../Farmer/css/graph.css" />
  <!-- Boxicons CSS -->
  <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <!-- Include Required Prerequisites -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
  
  <!-- Include Date Range Picker -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

  <!-- Include Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
</head>
<body>
  <?php
  include_once "adminSidebar.php";
  include_once "adminReportNav.php"; 
  ?>
  

  <div class="container-fluid">
    <!-- Widget Style 1 -->
    <div class="widget-row">
      <!-- Widget 1 -->
      <div class="widget-container">
        <div class="widget">
          <div class="widget-header">
            <h4>Total Orders</h4>
            <p style="font-size: 25px; font-weight: bold;"><?php echo $totalOrders; ?></p>
          </div>
          <div class="flex-container">
            <div class="chart-wrapper">
              <canvas id="totalLeadChart"></canvas>
              <div id="chartjs-tooltip"></div>
            </div>
            <div class="lead-items">
              <ul class="w-100 padding-screen-base ml-3">
                <li class="lead-item">
                  <div class="lead-circle lead-circle-cold"></div>
                  <span class="lead-desc">Pending</span>
                  <b class="lead-count"><?php echo $PendingOrders; ?></b>
                </li>
                <li class="lead-item">
                  <div class="lead-circle lead-circle-warm"></div>
                  <span class="lead-desc">Delivered</span>
                  <b class="lead-count"><?php echo $DeliveredOrders; ?></b>
                </li>
                <li class="lead-item">
                  <div class="lead-circle lead-circle-hot"></div>
                  <span class="lead-desc">Canceled</span>
                  <b class="lead-count"><?php echo $CanceledOrder; ?></b>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="widget-container">
        <div class="widget">
          <div class="widget-header">
            <h4>Total Sale</h4>
            <p style="font-size: 25px; font-weight: bold;"><?php echo $totalSale; ?></p>
          </div>
          <div class="flex-container">
            <div class="chart-wrapper">
              <canvas id="totalLeadChart1"></canvas>
              <div id="chartjs-tooltip"></div>
            </div>
            <div class="lead-items">
              <ul class="w-100 padding-screen-base ml-3">
                <li class="lead-item">
                  <div class="lead-circle lead-circle-cold"></div>
                  <span class="lead-desc">Pending</span>
                  <b class="lead-count"><?php echo $PendingOrders; ?></b>
                </li>
                <li class="lead-item">
                  <div class="lead-circle lead-circle-warm"></div>
                  <span class="lead-desc">Delivered</span>
                  <b class="lead-count"><?php echo $DeliveredOrders; ?></b>
                </li>
               
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Widget 2 -->
      <div class="widget-container">
        <div class="widget">
          <div class="widget-header">
            <h4>Total Income</h4>
            <p style="font-size: 25px; font-weight: bold;"><?php echo $TotalIncome; ?></p>
          </div>
          <div class="flex-container">
            <div class="chart-wrapper">
              <canvas id="totalSalesChart"></canvas>
              <div id="chartjs-tooltip"></div>
            </div>
            <div class="lead-items">
              <ul class="w-100 padding-screen-base ml-3">
                <li class="lead-item">
                  <div class="lead-circle lead-circle-cold"></div>
                  <span class="lead-desc">QR Code</span>
                  <b class="lead-count"><?php echo $QrIncome; ?></b>
                </li>
                <li class="lead-item">
                  <div class="lead-circle lead-circle-hot"></div>
                  <span class="lead-desc">Razorpay</span>
                  <b class="lead-count"><?php echo $Razorpay; ?></b>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Initialize the Chart.js charts
    var ctx1 = document.getElementById('totalLeadChart').getContext('2d');
    var totalLeadChart = new Chart(ctx1, {
      type: 'doughnut',
      data: {
        labels: ['Pending', 'Delivered', 'Canceled'],
        datasets: [{
          label: '# of Orders',
          data: [<?php echo $PendingOrders; ?>, <?php echo $DeliveredOrders; ?>, <?php echo $CanceledOrder; ?>],
          backgroundColor: [
            '#46A8DD',
            'yellow',
            'red'
          ],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        tooltips: {
          callbacks: {
            label: function(tooltipItem, data) {
              return data.labels[tooltipItem.index] + ': ' + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            }
          }
        }
      }
    });

    var ctx3 = document.getElementById('totalLeadChart1').getContext('2d');
    var totalLeadChart = new Chart(ctx3, {
      type: 'doughnut',
      data: {
        labels: ['Pending', 'Delivered'],
        datasets: [{
          label: '# of Orders',
          data: [<?php echo $PendingOrders; ?>, <?php echo $DeliveredOrders; ?>],
          backgroundColor: [
            '#46A8DD',
            'yellow' 
          ],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        tooltips: {
          callbacks: {
            label: function(tooltipItem, data) {
              return data.labels[tooltipItem.index] + ': ' + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            }
          }
        }
      }
    });

    var ctx2 = document.getElementById('totalSalesChart').getContext('2d');
    var totalSalesChart = new Chart(ctx2, {
      type: 'doughnut',
      data: {
        labels: ['QR Code', 'Razorpay'],
        datasets: [{
          label: 'Sales',
          data: [<?php echo $QrIncome; ?>, <?php echo $Razorpay; ?>],
          backgroundColor: [
            '#46A8DD',
            'red'
          ],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        tooltips: {
          callbacks: {
            label: function(tooltipItem, data) {
              return data.labels[tooltipItem.index] + ': ' + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            }
          }
        }
      }
    });
  </script>
</body>
</html>
