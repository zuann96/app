<div class="container mt-5">    
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Filters</h5>     

                <div class="mb-3">
                  <label for="yearFilter" class="form-label">Year:</label>
                  <select class="form-select" id="yearFilterMedicineSales">
                    <?php foreach ($availableYears as $year) : ?>
                    <option value="<?= $year ?>"><?= $year ?></option>
                    <?php endforeach; ?>                     
                  </select>                  
                </div>

                <div class="mb-3">
                  <label for="colorFilterSales" class="form-label">Color:</label>
                  <select class="form-select" id="colorFilterSales">
                    <option value="rgba(75, 2, 192, 0.5)">Purple</option>
                    <option value="rgba(255, 0, 0, 0.5)">Red</option>
                    <option value="rgba(0, 128, 0, 0.5)" selected>Green</option>
                    <option value="rgba(0, 0, 255, 0.5)">Blue</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="typeFilterSales" class="form-label">Type:</label>
                  <select class="form-select" id="typeFilterSales">
                    <option value="bar">Bar</option>
                    <option value="line">Line</option>
                    <option value="bubble">Bubble</option>
                  </select>
                </div>

                <button class="btn btn-primary" id="medicineSalesByYearFilterBTN">Apply Filters</button>               
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Drug sold in year <span id="year_title"></span></h5>
            <canvas id="medicineSalesByYearChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>