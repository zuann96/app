
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
     <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link fs-4 <?= ($currentPage === 'home') ? 'active' : '' ?>" href="home">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-4  <?= ($currentPage === 'sales') ? 'active' : '' ?>" href="sales">SALES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-4  <?= ($currentPage === 'sales') ? 'upload' : '' ?>" href="/upload">UPLOAD</a>
        </li>
      </ul>
    </div>
  </div> 
</nav>