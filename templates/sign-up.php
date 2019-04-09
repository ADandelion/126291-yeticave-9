    <main >
        <nav class="nav">
            <ul class="nav__list container">

                <?php foreach ($categories as $index): ?>
                    <li class="nav__item">
                        <a  href="pages/all-lots.html"><?=screening_txt($index['name']); ?></a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </nav>
        <form class="form container <?= count($errors) > 0 ? 'form--invalid' : '' ?>"
              enctype="multipart/form-data"
              action="sign-up.php"
              method="post"
              name="addUser">
            <h2>Регистрация нового аккаунта</h2>
            <div class="form__item  <?= isset($errors['email']) ? 'form__item--invalid' : '' ?>">
                <label for="email">E-mail*</label>
                <input id="email" type="text" name="email" placeholder="Введите e-mail"
                       value="<?=isset($_POST['email'])   ? screening_txt($_POST['email']) : ''?>">
                <span class="form__error"><?=isset($errors['email'])  ? $errors['email'] : ''?></span>
            </div>
            <div class="form__item <?= isset($errors['password']) ? 'form__item--invalid' : '' ?>">
                <label for="password">Пароль*</label>
                <input id="password" type="text" name="password" placeholder="Введите пароль" value="<?= isset($_POST['password'])  ? screening_txt($_POST['password']) : ''?>">
                <span class="form__error"><?= isset($errors['password']) ? 'Введите пароль' : '' ?></span>
            </div>
            <div class="form__item <?= isset($errors['name']) ? 'form__item--invalid' : '' ?>">
                <label for="name">Имя*</label>
                <input id="name" type="text" name="name" placeholder="Введите имя"  value="<?=isset($_POST['name'])  ? screening_txt($_POST['name']) : ''?>">
                <span class="form__error"> <?= isset($errors['name']) ? 'Введите имя' : '' ?></span>
            </div>
            <div class="form__item <?= isset($errors['contacts']) ? 'form__item--invalid' : '' ?>">
                <label for="message">Контактные данные*</label>
                <textarea id="message" name="contacts" placeholder="Напишите как с вами связаться"  ><?=isset($_POST['contacts'])  ? screening_txt($_POST['contacts']) : ''?></textarea>
                <span class="form__error"><?= isset($errors['contacts']) ? 'Напишите как с вами связаться' : '' ?></span>
            </div>
            <div class="form__item form__item--file form__item--last">
                <label>Аватар</label>
                <div class="preview">
                    <button class="preview__remove" type="button">x</button>
                    <div class="preview__img">
                        <img src="img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
                    </div>
                </div>
                <div class="form__input-file">
                    <input class="visually-hidden" type="file" id="photo2" value="" name="image">
                    <label for="photo2">
                        <span>+ Добавить</span>
                    </label>
                    <span class="form__error"><?= isset($errors['image']) ? $errors['image']  : '' ?></span>

                </div>
            </div>
            <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
            <button type="submit" class="button">Зарегистрироваться</button>
            <a class="text-link" href="login.php">Уже есть аккаунт</a>
        </form>
    </main>