<!DOCTYPE html>
<html lang="en">
<? include "public/includes/head.php" ?>
<body>

<? include "public/includes/header.php" ?>

<? include "public/includes/nav.php" ?>

 <div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Filters</h5>
            Filter options (year, country, medicine, etc.)
              <form>
      <div class="mb-3">
        <label for="yearFilter" class="form-label">Year:</label>
        <select class="form-select" id="yearFilter">
          <option value="">All</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option> 
          Add more options as needed
        </select>
      </div>
      <div class="mb-3">
        <label for="countryFilter" class="form-label">Country:</label>
        <select class="form-select" id="countryFilter">
          <option value="">All</option>
          <option value="USA">USA</option>
          <option value="UK">UK</option>
          <option value="Germany">Germany</option> 
           Add more options as needed 
         </select>
      </div>
      <div class="mb-3">
        <label for="medicineFilter" class="form-label">Medicine:</label>
        <select class="form-select" id="medicineFilter">
          <option value="">All</option>
          <option value="Medicine A">Medicine A</option>
          <option value="Medicine B">Medicine B</option>
          <option value="Medicine C">Medicine C</option>
           Add more options as needed 
         </select>
      </div> 
       Add more filter options here 
      <button type="submit" class="btn btn-primary">Apply Filters</button>
    </form>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Visualization</h5>
            <canvas id="myChart"></canvas>
            <script> -->
 // Obtén el contexto del lienzo
  var ctx = document.getElementById('myChart').getContext('2d');

  // Datos para el gráfico (ejemplo)
  var data = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
    datasets: [{
      label: 'Sales',
      data: [120, 230, 180, 310, 220, 150],
      backgroundColor: ['rgba(75, 2, 192, 0.5)','rgba(75, 2, 192, 0.5)','rgba(75, 2, 5, 0.5)'],
      borderColor: 'rgba(75, 192, 192, 1)',
      borderWidth: 1
    }]
  };

  // Configuración del gráfico
  var config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  };

  // Crea el gráfico
  var myChart = new Chart(ctx, config);</script>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
