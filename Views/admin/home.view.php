
                                   
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Tableau de bord</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-2">les dernières personnes inscrites</h4>

                                        <div class="table-responsive">
                                            <table class="table table-centered table-hover mb-0">
                                                <tbody>
                                                    <?php foreach($users as $user): { ?>
                                                        <tr>
                                                            <td>
                                                                <h5 class="font-14 mb-1 font-weight-normal"><?= $user->getLastName() . " | " . $user->getFirstName(); ?></h5>
                                                                <span class="text-muted font-13"><?= $user->getCreatedAt(); ?></span>
                                                            </td>
                                                        </tr>
                                                    <?php } endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->


