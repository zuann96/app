var charts = [];


function medicineSalesByYearChart(year = null) {

    let ctx = document.getElementById('medicineSalesByYearChart').getContext('2d');
    let year_title = document.getElementById('year_title');

    let labels = [];
    let sales = [];
  
    if (year == null) year = new Date().getFullYear();

    if (typeof myChart !== 'undefined') {
      myChart.destroy();
    }   
  
    var url = "controllers/SalesController.php";
    var method = "POST";
    var data = "action=ajaxGetSalesByYear&year=" + year;
  
    ajaxRequest(url, method, data, function(response) {
      try {
        
        var salesByYear = JSON.parse(response);
        
        salesByYear.forEach(function(item) {
            labels.push(item.MEDICINE);
            sales.push(parseInt(item.SOLDS));
          });

            
          var chartData = {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [{
                label: 'Sales',
                data: sales,
                backgroundColor: 'rgba(75, 2, 192, 1)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          };
          
    
        // Crea el gráfico
        var myChart = new Chart(ctx, chartData);

        year_title.textContent = year;

      } catch (error) {
        console.error("Error al analizar la respuesta JSON:", error);
      }
    }, function(errorStatus) {
      console.error("Error al obtener las ventas por año:", errorStatus);
    });
  }
  
  function initializePage() {
    medicineSalesByYearChart();
  }

window.onload = initializePage;

document.addEventListener('DOMContentLoaded', function() {
  var yearSelect = document.getElementById('yearFilterMedicineSales');
  var applyFiltersBtn = document.getElementById('medicineSalesByYearFilterBTN');

  applyFiltersBtn.addEventListener('click', function() {
    var selectedYear = yearSelect.value;
    medicineSalesByYearChart(selectedYear);
  });
});

  