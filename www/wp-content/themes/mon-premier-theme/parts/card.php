<div class="card">
    <div>
        <?php the_post_thumbnail('post-thumbnail', ['style'=> 'height: auto;']); ?>
    </div>

    <div class="card-body bg-none">
<!--        <h5 class="card-title"> --><?php //the_title() ?><!-- </h5>-->
<!--        <h6 class="card-subtitle mb-2 text-muted">  --><?php //the_category(); ?><!-- </h6>-->
        <h6 class="card-subtitle mb-2 text-muted typeIllustration"> <?php the_terms(get_the_ID(), 'illustrationType'); ?> </h6>
<!--        <p class="card-text"> --><?php //the_content() ?><!-- </p>-->
<!--        <a href="--><?php //the_permalink(); ?><!--" class="btn buttonGreen">Voir plus</a>-->
        <a href="<?php the_permalink(); ?>"><h5 class="titreArticle"> <?php the_title() ?> </h5></a>
        <?php //the_author() ?>
    </div>



</div>