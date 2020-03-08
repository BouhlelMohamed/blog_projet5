            <!--ICI CONTENT-->
            <br>
            <div class="card">
                <div class="card-body">

                        <h4 class="header-title mb-3">Les commentaires</h4>

                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Liste des commentaires</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane show active" id="profile1">
                            <div class="card">
                                    <div class="card-body">
                                        <p class="text-muted font-14 mb-4">
                                            Vous pouvez : <code>Valider ou supprimer.</code>
                                        </p>
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped table-centered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Auteur</th>
                                                        <th>Article</th>
                                                        <th>Commentaire</th>
                                                        <th>Approuvé/Supprimer</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  foreach($comments as $comment):
                                                    {                                               
                                                    ?>
                                                    <tr>
                                                        <td><?= $comment->getId();?></td>

                                                        <?php $idAuthor = $comment->getIdAuthor(); ?>

                                                        <?php //array_unique($authors[$idAuthor]); ?>

                                                        <td><?php echo $authors[$idAuthor]["username"];  ?></td>

                                                        <td><?= $comment->getIdPost();?></td>

                                                        <td><?= $comment->getContent();?></td>
                                                        
                                                        <td class="table-action">
                                                        <?php if($comment->getState() == 0): { ?>
                                                        <a  href="validateComment?id=<?= $comment->getId()  ?>"  class="action-icon"><img src="https://img.icons8.com/color/30/000000/approval--v1.png"></a>
                                                        <a href="deleteComment?id=<?= $comment->getId()  ?>" class="action-icon"><img src="https://img.icons8.com/plasticine/30/000000/filled-trash.png"></a></td>
                                                        <?php }else:{  ?>
                                                        <a href="deleteComment?id=<?= $comment->getId()  ?>" class="action-icon"><img src="https://img.icons8.com/plasticine/30/000000/filled-trash.png"></a></td>
                                                        <?php } endif;  ?>
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


        <script>
/*
         function changeState()
         {
             var myRequest = new XMLHttpRequest();
             myRequest.onreadystatechange = function()
             {
                 if(this.readyState === 4 && this.status === 200)
                 {
                     console.log(this.responseText);
                 }
             };

             myRequest.open("POST","validateComment?id=17");
             myRequest.setRequestHeader(
                 "Content-Type",
                 "application/x-www-form-urlencoded"
             );
             myRequest.send();
             
                setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 0001);    
            
        
        
         }                                               
         */
        </script>