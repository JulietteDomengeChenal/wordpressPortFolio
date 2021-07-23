<form class="d-flex" action="<?php esc_url(home_url('/')) ?>">
    <input class="form-control me-2 searchBar" name="s" type="search" placeholder="Recherche" aria-label="Search" value="<?= get_search_query() ?>">
    <button class="btn buttonNGreen type="submit">Rechercher</button>
</form>