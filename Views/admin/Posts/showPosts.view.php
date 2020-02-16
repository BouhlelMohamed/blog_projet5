
            <!--ICI CONTENT-->
            <br>
            <div class="card">
                <div class="card-body">

                        <h4 class="header-title mb-3">Les articles</h4>

                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Liste des articles</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane show active" id="profile1">
                            <div class="card">

                                    <div class="card-body">

                                        <div class="text-muted">
                                            Vous pouvez : <code>Ajouter , Modifier ou supprimer.</code>
                                        </div>
                                        <div data-toggle="modal" data-target="#signup-modal-insert" class="float-right"><img src="https://img.icons8.com/nolan/33/add.png" title="Ajouter"></div>
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped table-centered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Titre</th>
                                                        <th>Chapo</th>
                                                        <th>Date de création</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($posts as $post):
                                                    {                                               
                                                    ?>
                                                    <tr>
                                                        <td><?= $post->getId();?></td>
                                                        <td><?= $post->getTitle();?></td>
                                                        <td><?= $post->getChapo();?></td>
                                                        <td><?= $post->getCreatedAt();?></td>                                                              
                                                        <td class="table-action">
                                                            <a href="post?id=<?= $post->getId() ?>" class="action-icon"><img src="https://img.icons8.com/dusk/25/000000/edit.png" title="Modifier"></a>
                                                            <a href="deletePost?id=<?= $post->getId() ?>" class="action-icon"><img src="https://img.icons8.com/dusk/25/000000/filled-trash.png" title="Supprimer"></a>
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

        <div id="signup-modal-insert" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <form class="pl-3 pr-3" method="POST" action="insertPost">
                                            <div class="form-group">
                                                <label>Titre :</label>
                                                <input class="form-control" name="title" type="text">
                                            </div>

                                            <div class="form-group">
                                                <label>Châpo : </label>
                                                <input class="form-control" name="chapo" type="text">
                                            </div>

                                            <div class="form-group">
                                                <label>Texte :</label>
                                                <textarea class="form-control" name="content"></textarea>
                                            </div>
                                            <div class="form-group text-center">
                                                <button class="btn btn-primary" type="submit">Ajouter</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                                    
