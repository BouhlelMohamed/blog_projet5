
<div class="content-blocks portfolio">
                <section class="content">
                    <div class="block-content">
                        <h3 class="block-title">Mon blog</h3>
                        <div class="row">
                            <div class="col-md-10 mx-auto">
                                <?php foreach($posts as $post):{ ?>
                                <div class="post">
                                    <div class="post-title">
                                        <a href="blog?id=<?= $post->getId(); ?>"><h2><?= $post->getTitle(); ?></h2></a>
                                        <p class="post-info">
                                            <?php $idAuthor = $post->getIdAuthor(); 
                                            foreach($authors as $author): {
                                                if($idAuthor == $author['id_user']):
                                                {
                                            ?>
                                                <span class="post-author">Auteur : <?= ucfirst($author['username']); ?></span>
                                            <?php
                                                }endif;
                                             }endforeach; 
                                             ?>
                                            <span class="slash"></span>
                                            <span class="post-date"><?= $post->getUpdateAt(); ?></span>
                                            <span class="slash"></span>
                                            <span class="post-catetory"><?= $post->getChapo(); ?></span>
                                        </p>
                                    </div>
                                    <div class="post-body">
                                        <p><?=  substr($post->getContent(),0,350); ?></p>
                                            <a class="btn" href="blog?id=<?= $post->getId(); ?>">Voir plus</a>
                                    </div>
                                </div>
                                <?php } endforeach; ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>



            