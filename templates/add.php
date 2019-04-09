    <main>
        <nav class="nav">
            <ul class="nav__list container">

                <?php foreach ($categories as $index): ?>
                    <li class="nav__item">
                        <a  href="pages/all-lots.html"><?=screening_txt($index['name']) ; ?></a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </nav>

        <form class="form form--add-lot container <?= count($errors) > 0 ? 'form--invalid' : '' ?>"
              enctype="multipart/form-data"
              action="add.php"
              method="post"
              name="addLot">
            <h2>Добавление лота</h2>
            <div class="form__container-two">
                <div class="form__item  <?= isset($errors['name']) ? 'form__item--invalid' : '' ?>">
                    <label for="lot-name">Наименование</label>
                    <input
                            id="lot-name"
                            type="text"
                            name="name"
                            placeholder="Введите наименование лота"
                            value="<?=isset($_POST['name'])  ? screening_txt($_POST['name']) : ''?>"

                    >
                    <span class="form__error "><?=isset($errors['name'])  ? 'Введите наименование лота' : '' ?></span>
                </div>
                <div class="form__item <?= isset($errors['category']) ? 'form__item--invalid' : '' ?>">
                    <label for="category">Категория</label>
                    <select id="category" name="category" required>
                        <option value="0" <?=!isset($_POST['category']) || screening_txt(isset($_POST['category'])) === 0 ? 'selected' : ''?> disabled>Выберите категорию</option>

                        <?php foreach ($categories as  $index): ?>

                            <option
                                    value="<?=screening_txt($index['id']) ; ?>"> <?=screening_txt($index['name']) ; ?>
                                    <?=screening_txt(isset($_POST['category']))  &&  intval($_POST['category']) === $index['id'] ? 'selected' : ''?>
                            </option>

                        <?php endforeach; ?>
s
                    </select>
                    <span class="form__error "><?=isset($errors['category'])  ? 'Выберите категори' : ''?>ю</span>
                </div>
            </div>
            <div class="form__item form__item--wide <?=isset($errors['description'])  ? 'form__item--invalid' : '' ?>">
                <label for="message">Описание</label>
                <textarea id="message" name="description" placeholder="Напишите описание лота"><?=isset($_POST['description'])  ? screening_txt($_POST['description']) : ''?></textarea>
                <span class="form__error"><?=isset($errors['description'])  ? 'Напишите описание лота' : '' ?></span>
            </div>
            <div class="form__item form__item--file <?=isset($errors['image']) ? 'form__item--invalid' : '' ?>">
                <label>Изображение</label>
                <div class="preview">
                    <button class="preview__remove" type="button">x</button>
                    <div class="preview__img">
                        <img src="" width="113" height="113" alt="Изображение лота">
                    </div>
                </div>
                <div class="form__input-file ">
                    <input class="visually-hidden" type="file" id="photo2" name="image" >
                    <label for="photo2">
                        <span>+ Добавить</span>
                    </label>
                </div>
                <span class="form__error"><?=isset($errors['image'])  ? $errors['image'] : ''?></span>
            </div>
            <div class="form__container-three">
                <div class="form__item form__item--small <?=isset($errors['starting_price'])  ? 'form__item--invalid' : '' ?>">
                    <label for="lot-rate">Начальная цена</label>
                    <input id="lot-rate" type="number" name="starting_price" placeholder="0" value="<?=isset($_POST['starting_price'])  ? screening_txt($_POST['starting_price']) : ''?>">
                    <span class="form__error"><?=isset($errors['bet_step'])  ? $errors['bet_step'] : ''?></span>
                </div>
                <div class="form__item form__item--small <?=isset($errors['bet_step'])  ? 'form__item--invalid' : '' ?>">
                    <label for="lot-step">Шаг ставки</label>
                    <input id="lot-step" type="number" name="bet_step" placeholder="0" value="<?=isset($_POST['bet_step'])  ? screening_txt($_POST['bet_step']) : ''?>">
                    <span class="form__error"><?=isset($errors['bet_step'])  ? $errors['bet_step'] : ''?></span>
                </div>
                <div class="form__item <?= isset($errors['date_expire']) ? 'form__item--invalid' : '' ?>">
                    <label for="lot-date">Дата окончания торгов</label>
                    <input class="form__input-date" id="date_expire" type="date" name="date_expire" value="<?=isset($_POST['date_expire']) ? screening_txt($_POST['date_expire'])  : ''?>">
                    <span class="form__error"><?=isset($errors['date_expire'])  ? $errors['date_expire'] : ''?></span>
                </div>
            </div>
            <span class="form__error form__error--bottom"><?= count($errors) > 0 ? 'Пожалуйста, исправьте ошибки в форме.' : '' ?></span>
            <button type="submit" class="button" name="send">Добавить лот</button>
        </form>

    </main>




