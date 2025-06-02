<?=$header?>

<main class="catalog-container">
    <section class="catalog-section panel">
        <div class="product-box">
            <h3 class="product-name">Panel 100wats</h3>
            <a href="<?= base_url(); ?>" class="product-link">Ver Productos</a>
        </div>
    </section>

    <section class="catalog-section regulador">
        <div class="product-box">
            <h3 class="product-name">Panel 200wats</h3>
            <a href="<?= base_url('listado_productos/2'); ?>" class="product-link">Ver Productos</a>
        </div>
    </section>

    <section class="catalog-section inversor">
        <div class="product-box">
            <h3 class="product-name">Panel 500wats</h3>
            <a href="<?= base_url('listado_productos/3'); ?>" class="product-link">Ver Productos</a>
        </div>
    </section>
</main>
<?=$footer?>