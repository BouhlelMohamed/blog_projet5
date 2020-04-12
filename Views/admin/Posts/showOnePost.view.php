    <?php 
        if(!empty($successMessageUpdatePost))
        {
            echo $successMessageUpdatePost;
        }
    ?>
                   <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                        <li class="list-group-item">
                                            <div class="mb-2">
                                                <code>Modifier :</code>
                                                <hr/>
                                                <form  method="POST" action="updatePost?id=<?= $_GET['id']?>">
                                                <div id="summernote-editmode">
                                                <div class="form-group">
                                                    <label>Auteur :</label>
                                                    <input class="form-control" disabled type="text" value="<?= $author[0]["username"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Titre :</label>
                                                    <input class="form-control" name="title" type="text" value="<?= $post->getTitle(); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Châpo :</label>
                                                    <input class="form-control" name="chapo" type="text" value="<?= $post->getChapo(); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Texte :</label>
                                                    <textarea class="form-control" name="content" rows="12"><?= $post->getContent(); ?></textarea>
                                                </div>
                                                <button class="btn btn-success btn-sm mt-2"><i class="mdi mdi-content-save-outline mr-1"></i>Sauvegarder</button>
                                                </form>
                                            </div>
                                        </li>
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->
