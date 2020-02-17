<?php session_start(); ?>
  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="main_blog_details">
                <a href="#"><h4><?= $post->getTitle() ?></h4></a>
                <div class="user_details">
                  <div class="float-left">
                    <a href="#"><?= $post->getChapo() ?></a>
                  </div>
                  <div class="float-right mt-sm-0 mt-3">
                    <div class="media">
                      <div class="media-body">
                        <h5><?php // uathor ?></h5>
                        <p>Auteur : <?= $author ?> <br>Mis à jour le <?= $post->getUpdateAt() ?></p>
                      </div>
                    </div>
                  </div>
                </div>
               
           <blockquote class="blockquote">
             <p class="mb-0"><?= $post->getContent() ?></p>
           </blockquote>
           
               <div class="news_d_footer flex-column flex-sm-row">
                 <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><span class="align-middle mr-2"><i class="ti-themify-favicon"></i></span><?php if(!empty(count($comments)) > 9){ echo count($comments); }else{ echo "0" . count($comments); } ?> Commentaires</a>
               </div>
              </div>

                <?php foreach($comments as $comment): { ?>
                <div class="comments-area">
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="desc">
                                <?php  foreach($authorComment as $author): { 
                                      if($comment->getIdAuthor() == $author->getIdAuthor()){ ?>
                                    <h5><a href="#"><?= $author->getAuthor(); ?></a></h5>
                                                        <?php }//if
                                                        } endforeach; ?>
                                    <p class="date"><?= $comment->getCreatedAt(); ?></p>
                                    <p class="comment">
                                        <?= $comment->getContent(); ?>                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>	
                <?php } endforeach; ?>
        <?php if(isset($_SESSION['username']) !== NULL && session_status() == PHP_SESSION_ACTIVE): ?> 

                <div class="comment-form">
                    <h4>Ajouter un commentaire</h4>
                    <form action="blogInsertComment?id=<?=  $_GET['id'] ?>" method="post">
                      <input style="display:none;" name="idAuthor" value="<?= $_SESSION['id'] ?>" >
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="content" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                        </div>
                        <button class="button submit_btn">Envoyer</button>	
                    </form>
                </div>
        </div>


        <?php endif ?>
