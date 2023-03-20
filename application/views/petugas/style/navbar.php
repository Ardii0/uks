<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="<?php echo base_url('Admin/setting') ;?>" class="nav-link hover-animation">
                <i class="fas fa-cog"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
</a>
</nav>

<style>
.fa-cog {
    transition: transform .5s ease-in-out;
}

.hover-animation:hover .fa-cog {
    transform: rotate(160deg);
}
</style>