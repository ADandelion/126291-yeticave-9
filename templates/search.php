<main >
    <nav class="nav">
        <ul class="nav__list container">
            <ul class="nav__list container">
                <?php foreach ($categories as $index): ?>
                    <li class="nav__item">
                        <a  href="pages/all-lots.html"><?=screening_txt($index['name']); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </ul>
    </nav>
    <div class="container">
        <section class="lots">
            <h2>Результаты поиска по запросу «<span><?=$_GET['search']; ?></span>»</h2>
            <ul class="lots__list">

                <?php foreach ($search_result as  $item): ?>

                <li class="lots__item lot">
                    <div class="lot__image">
                        <img src="<?=$item['image']; ?>" width="350" height="260" alt="Сноуборд">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"><?=$item['cat_name']; ?></span>
                        <h3 class="lot__title"><a class="text-link" href="lot.php?id=<?=$item['id']; ?>"><?=$item['name']; ?></a></h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <span class="lot__amount">Стартовая цена</span>
                                <span class="lot__cost"><?=formatPrice($item['starting_price']); ?></span>
                            </div>
                            <div class="lot__timer timer">
                                <?=lot_expire($item['date_expire']); ?>
                            </div>
                        </div>
                    </div>
                </li>

                <?php endforeach; ?>

            </ul>
        </section>
        <ul class="pagination-list">
            <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
            <li class="pagination-item pagination-item-active"><a>1</a></li>
            <li class="pagination-item"><a href="#">2</a></li>
            <li class="pagination-item"><a href="#">3</a></li>
            <li class="pagination-item"><a href="#">4</a></li>
            <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
        </ul>
    </div>
</main>