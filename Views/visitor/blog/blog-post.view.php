  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="main_blog_details">
                <a href="#"><h4><?= $post->getTitle(); ?></h4></a>
                <div class="user_details">
                  <div class="float-left">
                    <a href="#"><?= $post->getChapo(); ?></a>
                  </div>
                  <div class="float-right mt-sm-0 mt-3">
                    <div class="media">
                      <div class="media-body">
                        <p>Auteur : <?= $author[0]["username"]; ?> <br>Mis à jour le <?= $post->getUpdateAt() ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                  <blockquote class="blockquote">
                    <p class="mb-0"><?php echo nl2br($post->getContent()); ?></p>
                  </blockquote>
                    <div class="news_d_footer flex-column flex-sm-row">
                      <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><span class="align-middle mr-2"><i class="ti-themify-favicon"></i></span><?php if(!empty(count($comments)) > 9){ echo count($comments); }else{ echo "0" . count($comments); } ?> Commentaires</a>
                    </div>

                    
                    <?php 
                          foreach($comments as $comment): { 
                          $idAuthor = $comment->getIdAuthor();     
                          //echo $authors[25]["username"];die;?>
                <div class="comments-area" style="padding:0!important">
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="desc">
                                    <h5><a><?= $authors[$idAuthor]["username"]; ?></a></h5>
                                    <p class="date" style="margin-bottom: 0px;"><?= $comment->getCreatedAt(); ?></p>
                                    <p class="comment" style="margin-bottom: 5px;">
                                        <?= $comment->getContent(); ?>                                    
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <?php } endforeach; ?>
              <?php if(!empty($_SESSION['username']) AND (!empty($_SESSION['id'])) !== NULL && session_status() == PHP_SESSION_ACTIVE): ?> 
                    <?php //echo $_SESSION['username'] . " " . $_SESSION['id']; ?>
                      <div class="comment-form">
                          <h4>Ajouter un commentaire</h4>
                          <form action="blogInsertComment?id=<?= $post->getId() ?>" method="post">
                            <input style="display:none;" name="idAuthor" value="<?= $_SESSION['id'] ?>" >
                              <div class="form-group">
                                  <textarea class="form-control mb-10" rows="5" name="content" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                              </div>
                              <button class="button submit_btn">Envoyer</button>	
                          </form>
                      </div>
              <?php endif; ?>
        </section>
