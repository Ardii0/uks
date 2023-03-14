<nav class="fixed-top navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>" role="button">
                Home
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Landingpage/daftar_buku')?>" role="button">
                Perpustakaan
            </a>
        </li> -->
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kategori
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Perang Dunia</a>
              <a class="dropdown-item" href="#">Penjajahan</a>
              <a class="dropdown-item" href="#">Konspirasi Abad Ini</a>
          </div>
      </li> -->
        <li class="nav-item d-flex justify-content-center dropdown">
            <a class="nav-link" href="<?php echo base_url ('/search')?>">
                <i class="fa fa-search lp-icons"></i>
                Cari
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="<?php echo base_url ('Login')?>" class="btn btn-success">
                Login
            </a>
        </li>
    </ul>
</nav>