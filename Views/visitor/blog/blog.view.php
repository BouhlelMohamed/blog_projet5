<div class="content-blocks portfolio">
                <section class="content">
                    <div class="block-content">
                        <h3 class="block-title">Mon blog</h3>
                        <div class="row">
                            <div class="col-md-10 mx-auto">
                                <?php foreach($posts as $post):{ ?>
                                <div class="post">
                                    <div class="post-title">
                                        <a class="open-post" href="post?id=<?= $post->getId(); ?>"><h2><?= $post->getTitle(); ?></h2></a>
                                        <p class="post-info">
                                            <span class="post-author">Auteur : <?= $post->getTitle(); ?></span>
                                            <span class="slash"></span>
                                            <span class="post-date"><?= $post->getCreatedAt(); ?></span>
                                            <span class="slash"></span>
                                            <span class="post-catetory"><?= $post->getChapo(); ?></span>
                                        </p>
                                    </div>
                                    <div class="post-body">
                                        <p><?= $post->getContent(); ?></p>
                                            <a class="btn" href="blog?id=<?= $post->getId(); ?>">Read More</a>
                                    </div>
                                </div>
                                <?php } endforeach; ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>



            