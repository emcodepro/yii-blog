<?
use yii\helpers\Url;
?>
<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
            <?php foreach ($popularPosts as $popularPost): ?>
              <div class="popular-post">
                  <a href="<?= Url::to(['site/read', 'id' => $article->id]);?>" class="popular-img"><img src="<?=$popularPost->getImage();?>" alt="">
                      <div class="p-overlay"></div>
                  </a>
                  <div class="p-content">
                      <a href="<?= Url::to(['site/read', 'id' => $article->id]);?>" class="text-uppercase"><?=$popularPost->title;?></a>
                      <span class="p-date"><?=$popularPost->getDate();?></span>
                  </div>
              </div>
            <?php endforeach; ?>
        </aside>
        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>
            <?php foreach ($recentPosts as $recentPost): ?>
              <div class="thumb-latest-posts">
                  <div class="media">
                      <div class="media-left">
                          <a href="<?= Url::to(['site/read', 'id' => $article->id]);?>" class="popular-img"><img src="<?=$recentPost->getImage();?>" alt="">
                              <div class="p-overlay"></div>
                          </a>
                      </div>
                      <div class="p-content">
                          <a href="<?= Url::to(['site/read', 'id' => $article->id]);?>" class="text-uppercase"><?=$recentPost->title;?></a>
                          <span class="p-date"><?=$recentPost->getDate();?></span>
                      </div>
                  </div>
              </div>
            <?php endforeach; ?>
        </aside>
        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Categories</h3>
            <ul>
              <?php foreach ($categories as $category): ?>
                <li>
                    <a href="<?= Url::to(['site/category', 'id' => $category->id]);?>"><?=$category->title;?></a>
                    <span class="post-count pull-right"> (<?=$category->getArticleCount();?>)</span>
                </li>
              <?php endforeach; ?>
            </ul>
        </aside>
    </div>
</div>
