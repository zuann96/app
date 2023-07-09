<div class="container mt-5">    
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Filters</h5>     

                <div class="mb-3">
                  <label for="yearFilter" class="form-label">Country:</label>
                  <select class="form-select" id="countryFilterPrice">
                    <?php foreach ($availableCountries as $index => $country) : ?>
                      <option value="<?= $index === 0 ? '0' : $country['ID'] ?>">
                        <?= $index === 0 ? 'All' : $country['NAME'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>                  
                </div>

                <div class="mb-3">
                  <label for="typeFilterSales" class="form-label">Type:</label>
                  <select class="form-select" id="typeFilterPrice">
                    <option value="bar">Bar</option>
                    <option value="line" selected>Line</option>
                  </select>
                </div>

                <button class="btn btn-primary" id="averagePricerBTN">Apply Filters</button>               
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Evolution average drug price per country</h5>
            <canvas id="priceEvolutionPriceChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>