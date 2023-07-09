var charts = [];

function generateRandomColor() {
  let r = Math.floor(Math.random() * 256);
  let g = Math.floor(Math.random() * 256);
  let b = Math.floor(Math.random() * 256);  
  return `rgba(${r}, ${g}, ${b}, 1`;
}


function priceEvolutionPriceChart(country, selectedType = "line") {
  let canvan_id = "priceEvolutionPriceChart";
  let ctx = document.getElementById(canvan_id).getContext("2d");

  let data;
  let labels = [], colors = [], datasets = [];
  let url = "controllers/SalesController.php";
  let method = "POST";

 
  if (country) {
    data = "action=ajaxgetPriceAverageEvolutionByCountry&country=" + country;
  } else {
    data = "action=ajaxgetPriceAverageEvolutionByCountry";
  }

  ajaxRequest(url, method, data, function(response) {
    try {
        let priceEvolutionData = JSON.parse(response);
      
        priceEvolutionData.forEach(function(item) {
        if(!labels.includes(item.YEAR))labels.push(item.YEAR);
        
        // Obtener el país del objeto de datos
        let country = item.NAME;
        colors.push(generateRandomColor());

        // Verificar si el país ya existe en los datasets
        let existingDataset = datasets.find(dataset => dataset.label === country);

        if (existingDataset) {
          // Si el país ya existe, agregar el precio a su dataset existente
          existingDataset.data.push(parseFloat(item.AVERAGE_PRICE));
        } else {
          // Si el país no existe, crear un nuevo dataset para él
          let dataset = {
            label: country,
            data: [parseFloat(item.AVERAGE_PRICE)],
            backgroundColor: colors,
            borderColor: colors,
            borderWidth: 2.5
          };
          datasets.push(dataset);
        }
      });

      let chartData = {
        type: selectedType,
        data: {
          labels: labels,
          datasets: datasets
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      if (canvan_id in charts) {
        charts[canvan_id].config.type = selectedType;
        charts[canvan_id].data = chartData.data;
        charts[canvan_id].update();
      } else {
        let newChart = new Chart(ctx, chartData);
        charts[canvan_id] = newChart;
      }

    } catch (error) {
      console.error(error, response);
    }
  }, function(errorStatus) {
    console.error("Error al obtener los datos de evolución de precios:", errorStatus);
  });
}



function medicineSalesByYearChart(year = null, selectedColor = "rgba(0, 128, 0, 0.5)", selectedType = "bar") {

  //canvan element
  let canvan_id = "medicineSalesByYearChart"; 

  let ctx = document.getElementById(canvan_id).getContext("2d");

  //title year
  let year_title = document.getElementById("year_title");

  let labels = [], sales = [];

  if (year == null) year = new Date().getFullYear();

  let url = "controllers/SalesController.php";
  let method = "POST";
  let data = "action=ajaxGetSalesByYear&year=" + year;

  ajaxRequest(url, method, data, function(response) {
    try {
      let salesByYear = JSON.parse(response);
      
        salesByYear.forEach(function(item) {
            labels.push(item.MEDICINE);
            sales.push(parseInt(item.SOLDS));
        });

        let chartData = {
          type: selectedType,
          data: {
            labels: labels,
            datasets: [{
              label: "Sales",
              data: sales,
              backgroundColor: selectedColor,
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

        if (canvan_id in charts) {
          charts[canvan_id].config.type = selectedType; 
          charts[canvan_id].data = chartData.data;
          charts[canvan_id].update();
        } else {
          let newChart = new Chart(ctx, chartData);
          charts[canvan_id] = newChart;
        }

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
  priceEvolutionPriceChart();
}

window.onload = initializePage;

document.addEventListener('DOMContentLoaded', function() {
  
  //btn filter
  let applyFiltersBtn = document.getElementById('medicineSalesByYearFilterBTN');
  let applyFiltersBtn2 = document.getElementById('averagePricerBTN');

  //year
  let yearSelect = document.getElementById('yearFilterMedicineSales');
      
  //color
  let colorSelect = document.getElementById("colorFilterSales");

  //type
  let typeSelect = document.getElementById("typeFilterSales");
  let typeSelect2 = document.getElementById("typeFilterPrice");

  //country
  let countrySelect = document.getElementById("countryFilterPrice");

  applyFiltersBtn.addEventListener('click', function() {
    medicineSalesByYearChart(yearSelect.value, colorSelect.value, typeSelect.value);
  });

  applyFiltersBtn2.addEventListener('click', function() {
    priceEvolutionPriceChart(countrySelect.value, typeSelect2.value);
  });

});

  