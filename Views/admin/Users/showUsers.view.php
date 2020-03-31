<?php if(!empty($successMessage))
        {
            echo $successMessage;
        }
        elseif(!empty($successMessageValidateUser))
        {
            echo $successMessageValidateUser;
        }
        elseif(!empty($successMessageForDeleteUser))
        {
            echo $successMessageForDeleteUser;
        }
?>

            <!--ICI CONTENT-->
            <br>
            <div class="card">
                <div class="card-body">
                        <h4 class="header-title mb-3">Utilisateurs</h4>

                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Liste des utilisateurs</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane show active" id="profile1">
                            <div class="card">
                                    <div class="card-body">

                                    <p class="text-muted font-14 mb-4">
                                            Vous pouvez : <code>Valider , Modifier ou supprimer.</code>
                                        </p>

                                        <div class="table-responsive-sm">
                                            <table class="table table-striped table-centered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Prénom</th>
                                                        <th>Nom de famille</th>
                                                        <th>Email</th>
                                                        <th>Pseudo</th>
                                                        <th>Actions</th>
                                                        <th>Rôles</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach($users as $user):
                                                    {     
                                                    ?>
                                                    <tr>
                                                    
                                                        <td><?= $user->getId();?></td>
                                                        <td><?= $user->getFirstName(); ?></td>
                                                        <td><?= $user->getLastName() ;?></td>
                                                        <td><?= $user->getEmail() ;?></td>
                                                        <td><?= $user->getUsername() ;?></td>
                                                        <td class="table-action">
                                                    <?php if($user->getState() == 0): { ;?>
                                                        <a href="user?id=<?= $user->getId(); ?>" class="action-icon"><img src="https://img.icons8.com/office/30/000000/find-user-male--v1.png"></a>
                                                        <a href="deleteUser?id=<?= $user->getId(); ?>" class="delete-icon-user action-icon"> <img src="https://img.icons8.com/office/30/000000/remove-user-male--v1.png"></a>
                                                        <a  href="validateUser?id=<?= $user->getId();  ?>"  class="action-icon"><img src="https://img.icons8.com/office/30/000000/checked-user-male--v1.png"></a>    
                                                    </td>
                                                    <?php }else:{ ?>
                                                                <a href="user?id=<?= $user->getId(); ?>" class="action-icon"><img src="https://img.icons8.com/office/30/000000/find-user-male--v1.png"></a>                                                            
                                                                <a href="deleteUser?id=<?= $user->getId(); ?>" class="delete-icon-user action-icon"><img src="https://img.icons8.com/office/30/000000/remove-user-male--v1.png"></a>                                                                                                                        
                                                    <?php } endif; ?>
                                                        <td>
                                                        <?php if($user->getRole() == 1): { ;?>
                                                                <a href="roleAdmin?id=<?= $user->getId(); ?>" class="change-role-users action-icon"><img src="https://img.icons8.com/color/30/000000/moderator-male--v1.png"></a>       
                                                            <?php } elseif($user->getRole() == 0 && $user->getState() == 1):{ ?>
                                                                <a href="roleUser?id=<?= $user->getId(); ?>" class="change-role-users action-icon"><img src="https://img.icons8.com/officel/30/000000/user.png"></a>       
                                                        <?php } endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php  } endforeach; ?> 
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div>
                            </div>
                        </div>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        </div>
        <!-- END wrapper -->
