<?php
use yii\helpers\Url;
 ?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                        <a href="blog.html"><img src="<?=$article->getImage();?>" alt=""></a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?= Url::to(['site/category', 'id' => $article->category_id]);?>"> <?=$article->category->title;?></a></h6>

                            <h1 class="entry-title"><a href="<?= Url::to(['site/read', 'id' => $article->id]);?>"><?=$article->title;?></a></h1>


                        </header>
                        <div class="entry-content">
                              <?=$article->description?>
                        </div>
                        <div class="decoration">
                           <?php foreach ($tags as $tag): ?>
                             <a href="#" class="btn btn-default"><?=$tag;?></a>
                           <?php endforeach; ?>
                        </div>

                        <div class="social-share">
                          <span
                                    class="social-share-title pull-left text-capitalize">By Rubel On <?=$article->getDate()?>
                          </span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>

                <?php if (!empty($comments)): ?>
                  <?php foreach ($comments as $comment): ?>
                    <div class="bottom-comment"><!--bottom comment-->
                        <h4><?//=$comments->count();?> comments</h4>

                        <div class="comment-img">
                            <img class="img-circle" src="<?=$comment->user->image;?>" alt="">
                        </div>

                        <div class="comment-text">
                            <a href="#" class="replay btn pull-right"> Replay</a>
                            <h5><?=$comment->user->name;?></h5>

                            <p class="comment-date">
                                <?=$comment->getDate();?>
                            </p>


                            <p class="para"><?=$comment->text;?></p>
                        </div>
                    </div>
                    <!-- end bottom comment-->
                  <?php endforeach; ?>
                <?php endif; ?>


                <div class="leave-comment"><!--leave comment-->
                    <h4>Leave a reply</h4>


                    <form class="form-horizontal contact-form" role="form" method="post" action="#">
                        <div class="form-group">
                            <div class="col-md-12">
										<textarea class="form-control" rows="6" name="comment"
                                                  placeholder="Write Massage"></textarea>
                            </div>
                        </div>
                        <a href="#" class="btn send-btn">Post Comment</a>
                    </form>
                </div><!--end leave comment-->
            </div>
            <?=$this->render('/partials/sidebar.php', [
                 'popularPosts' => $popularPosts,
                 'recentPosts' => $recentPosts,
                 'categories' => $categories,
               ]);
               ?>
        </div>
    </div>
</div>
<!-- end main content-->
