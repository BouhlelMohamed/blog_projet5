        <head>
            <title>Inscription</title>
        </head>
            <div class="col-lg-5">
                        <div class="card">
                            <!-- Logo-->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="index.html">
                                    <span><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Webysther_20160423_-_Elephpant.svg/350px-Webysther_20160423_-_Elephpant.svg.png" style="width:100px; height:70px" alt="" height="18"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Inscription</h4>
                                </div>
                                <hr>
                                <form action="register" method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="fullname">Nom</label>
                                                <input class="form-control" type="text" name="lastName" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Prénom</label>
                                                <input class="form-control" type="text" name="firstName" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="emailaddress">Email</label>
                                        <input class="form-control" type="email" id="emailaddress" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Pseudo</label>
                                        <input class="form-control"  name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mot de passe</label>
                                        <input class="form-control" type="password" name="mdp" required>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <input class="btn btn-primary" value="S'inscrire" name="input-submit" type="submit">
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <?php //if(isset($_POST['input-submit'])) {header('Location: login');} ?>

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Vous avez un compte ? <a href="login" class="text-muted ml-1"><b>Connectez-vous</b></a></p>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->