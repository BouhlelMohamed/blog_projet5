<?php if(empty($_SESSION['username']) OR (empty($_SESSION['role']) && $_SESSION['role'] == 0)){ header('location: login'); }    ?>
  <!-- Topbar Start -->
  <div class="navbar-custom">
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="https://img.icons8.com/wired/64/000000/client-management.png">                                    
                                    </span>
                                    <span>
                                        <span class="account-user-name"><?php if(session_status() == PHP_SESSION_ACTIVE){echo $_SESSION['username'];}?></span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Bienvenue !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="logout" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout mr-1"></i>
                                        <span>Déconnexion</span>
                                    </a>

                                </div>
                            </li>

                        </ul>

                    </div>
                    <!-- end Topbar -->
   