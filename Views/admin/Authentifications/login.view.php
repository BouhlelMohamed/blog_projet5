        <?php 
            if(!empty($successMessageAddUser))
            {
                echo $successMessageAddUser;
            }
        ?>
    <head>
        <title>Connexion</title>
    </head>
                    <div class="col-lg-5">
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="login">
                                    <span><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Webysther_20160423_-_Elephpant.svg/350px-Webysther_20160423_-_Elephpant.svg.png" style="width:100px; height:70px" alt="" height="18"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Connexion</h4>
                                </div>

                                <form method="POST" action="login">

                                    <div class="form-group" >
                                        <label>Email</label>
                                        <input class="form-control"  name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mot de passe</label>
                                        <input class="form-control" type="password" name="mdp" required>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary" type="submit">Se connecter</button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Vous n'avez pas de compte ?<a href="register" class="text-muted ml-1"><b>Inscrivez-vous</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
