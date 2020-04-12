<!--ICI CONTENT-->
<br>
            <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <form class="pl-3 pr-3" method="POST" action="updateUser?id=<?= $_GET['id']?>">
                                            <div class="form-group">
                                                <label>Prénom :</label>
                                                <input class="form-control" name="firstName" type="text" value="<?= $user->getFirstName() ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="emailaddress">Nom de famille : </label>
                                                <input class="form-control" name="lastName" type="text" value="<?= $user->getLastName() ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Email :</label>
                                                <input class="form-control" name="email" value="<?= $user->getEmail() ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Pseudo :</label>
                                                <input class="form-control" name="username" value="<?= $user->getUsername() ?>">
                                            </div>

                                            <div class="form-group text-center">
                                                <button class="btn btn-primary" type="submit">Modifier</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
            <div class="row">
                            <div class="col-sm-12">
                                <!-- Profile -->
                                <div class="card bg-primary">
                                    <div class="card-body profile-user-box">

                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="media">
                                                    <span class="float-left m-2 mr-4"><img src="https://cours-informatique-gratuit.fr/wp-content/uploads/2014/05/compte-utilisateur-1.png" style="height: 100px;" alt="" class="rounded-circle img-thumbnail"></span>
                                                    <div class="media-body">

                                                        <h4 class="mt-1 mb-1 text-white"><?= $user->getLastName() . ' ' . $user->getFirstName() ?></h4>
                                                        <p class="font-13 text-white-50"><?= $user->getEmail() ?> </p>

                                                        <ul class="mb-0 list-inline text-light">
                                                            <li class="list-inline-item mr-3">
                                                                <h5 class="mb-1"><?= ucfirst($user->getUsername()) ?></h5>
                                                                <p class="mb-0 font-13 text-white-50">Pseudo</p>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <h5 class="mb-1">
                                                                <?php
                                                                $roleUser = $user->getRole(); 
                                                                if($roleUser == 0)
                                                                { echo 'Utilisateur'; }
                                                                else
                                                                {echo 'Administrateur'; } 
                                                                ?>
                                                                </h5>
                                                                <p class="mb-0 font-13 text-white-50">Rôle</p>
                                                            </li>
                                                        </ul>
                                                    </div> <!-- end media-body-->
                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-sm-4">
                                                <div class="text-center mt-sm-0 mt-3 text-sm-right">
                                                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#signup-modal">
                                                    <a href="javascript: void(0);" class="action-icon" ><i class="mdi mdi-pencil"></i></a>
                                                    </button>
                                                </div>
                                            </div> <!-- end col-->
                                        </div> <!-- end row -->

                                    </div> <!-- end card-body/ profile-user-box-->
                                </div><!--end profile/ card -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
