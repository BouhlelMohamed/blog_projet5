<div class="col-lg-5">
                        <div class="card">
                            <!-- Logo-->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="index.html">
                                    <span><img src="../assets/images/logo.png" alt="" height="18"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Free Sign Up</h4>
                                    <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute </p>
                                </div>

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
                                        <input class="form-control" type="email" id="emailaddress" name="email" required placeholder="Enter your email">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control"  name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="mdp" required>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary" type="submit"> Sign Up </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Vous avez un compte ? <a href="pages-login.html" class="text-muted ml-1"><b>Log In</b></a></p>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->