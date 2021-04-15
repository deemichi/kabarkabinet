<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Personal</span></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url(); ?>" aria-expanded="false"><i class="mdi mdi-home"></i>Beranda</a>

                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-database"></i><span class="hide-menu">Data Master </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="<?php echo base_url('websitekl'); ?>" class="sidebar-link"><i class="mdi mdi-cards-variant"></i><span class="hide-menu"> Website K/L </span></a></li>
                        <li class="sidebar-item"><a href="<?php echo base_url('narsum'); ?>" class="sidebar-link"><i class="mdi mdi-account-plus"></i><span class="hide-menu"> Narsum </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url('login/logout'); ?>" aria-expanded="false"><i class="mdi mdi-exit-to-app"></i>Keluar</a>

                </li>



            </ul>


        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>