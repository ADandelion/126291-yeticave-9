    <main>
        <nav class="nav">
            <ul class="nav__list container">

                <?php foreach ($categories as $index): ?>
                    <li class="nav__item <?php if ($index['id'] == $cur): ?> nav__item--current <?php endif;?>">
                        <a  href="/all-lots.php?catid=<?=$index['id']; ?>"><?=screening_txt($index['name']); ?></a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </nav>
        <section class="lot-item container">
            <h2><?=screening_txt($lot['name']) ; ?></h2>
            <div class="lot-item__content">
                <div class="lot-item__left">
                    <div class="lot-item__image">
                        <img src="<?=$lot['image']; ?>" width="730" height="548" alt="Сноуборд">
                    </div>
                    <p class="lot-item__category">Категория: <span><?=screening_txt($lot['cat_name']) ; ?></span></p>
                    <p class="lot-item__description"><?=screening_txt($lot['description']) ; ?></p>
                </div>
                <div class="lot-item__right">
                    <div class="lot-item__state">
                        <div class="lot-item__timer timer">
                            <?=lot_expire($lot['date_expire']); ?>
                        </div>
                        <div class="lot-item__cost-state">
                            <div class="lot-item__rate">
                                <span class="lot-item__amount"></span>
                                <span class="lot-item__cost"><?=formatPrice($lot['price']); ?></span>
                            </div>
                            <div class="lot-item__min-cost">
                                Мин. ставка <span><?=formatPrice($lot['price'] + $lot['bet_step']); ?></span>
                            </div>
                        </div>
                        <?php if ($show_bet_form): ?>

                            <form class="lot-item__form <?= !empty($error) > 0 ? 'form--invalid' : '' ?>" enctype="multipart/form-data" action="" method="post">
                                <p class="lot-item__form-item form__item <?= !empty($error) ? 'form__item--invalid' : '' ?>">
                                    <label for="cost">Ваша ставка</label>
                                    <input id="cost" type="text" name="cost" placeholder="<?= $lot['price'] + $lot['bet_step']; ?>">
                                    <span class="form__error"><?= !empty($error) ? $error : '' ?></span>
                                </p>
                                <button type="submit" class="button" name="addBet">Сделать ставку</button>
                            </form>

                        <?php endif; ?>
                    </div>
                    <div class="history">
                        <h3>История ставок (<span><?=count($bets); ?></span>)</h3>
                        <table class="history__list">
                            <?php foreach ($bets as $bet): ?>

                            <tr class="history__item">
                                <td class="history__name"><?=screening_txt($bet['name']) ; ?></td>
                                <td class="history__price"><?=formatPrice($bet['price']) ; ?> </td>
                                <td class="history__time"><?=set_bet_time_phrase($bet['add_date']); ?></td>
                            </tr>

                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
