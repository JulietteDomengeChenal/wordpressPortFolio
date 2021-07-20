
<?php get_header(); ?>

<?php //the_content(); ?>

<!------------------Boucle pour lister les articles------------------>
<?php if (have_posts()): ?>
    <div class="row">
        <?php while (have_posts()): the_post(); ?>
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img src=" <?php the_post_thumbnail('post-thumbnail', ['style'=> 'height: auto;']); ?> "
                     class="card-img-top" alt="Image de l'article">
                <div class="card-body bg-dark">
                    <h5 class="card-title"> <?php the_title() ?> </h5>
                    <h6 class="card-subtitle mb-2 text-muted">  <?php the_category(); ?> </h6>
                    <p class="card-text"> <?php the_content() ?> </p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Voir plus</a>
                    <?php //the_author() ?>
                </div>
            </div>
        </div>
        <?php endwhile ?>
    </div>
<?php else: ?>
    <h3>Pas d'articles</h3>
<?php endif; ?>
<!----------------fin_Boucle pour lister les articles---------------->

<?php get_footer(); ?>
