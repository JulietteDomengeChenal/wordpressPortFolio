<div class="card" style="width: 18rem;">
    <img src=" <?php the_post_thumbnail('post-thumbnail', ['style'=> 'height: auto;']); ?> "
         class="card-img-top" alt="Image de l'article">
    <div class="card-body bg-dark">
        <h5 class="card-title"> <?php the_title() ?> </h5>
<!--    <h6 class="card-subtitle mb-2 text-muted">  --><?php //the_category(); ?><!-- </h6>-->
        <h6 class="card-subtitle mb-2 text-muted italic">  <?php the_terms(get_the_ID(), 'illustrationType'); ?> </h6>
        <p class="card-text"> <?php the_content() ?> </p>
        <a href="<?php the_permalink(); ?>" class="btn buttonGreen">Voir plus</a>
        <?php //the_author() ?>
    </div>
</div>