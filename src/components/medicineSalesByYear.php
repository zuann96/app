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
                <button type="submit" class="btn btn-primary" id="medicineSalesByYearFilterBTN">Apply Filters</button>               
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Drug sold in year <span id="year_title"></span></h5>
            <canvas id="medicineSalesByYearChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>