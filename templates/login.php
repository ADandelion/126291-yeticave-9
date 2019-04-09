    <main>
        <nav class="nav">
            <ul class="nav__list container">
                <?php foreach ($categories as $index): ?>
                    <li class="nav__item">
                        <a  href="pages/all-lots.html"><?=screening_txt($index['name']); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <form class="form container"
              action="login.php"
              method="post"
              name="login"
              <?= count($errors) > 0 ? 'form--invalid' : '' ?>
            >
            <h2>Вход</h2>
            <div class="form__item <?=isset($errors['email'])  ? 'form__item--invalid' : '' ?>">
                <label for="email">E-mail*</label>
                <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=isset($_POST['email'])  ? screening_txt($_POST['email']) : ''?>">
                <span class="form__error"><?=isset($errors['email'])  ? $errors['email'] : ''?></span>
            </div>
            <div class="form__item form__item--last <?=screening_txt(isset($errors['password']))  ? 'form__item--invalid' : '' ?>">
                <label for="password">Пароль*</label>
                <input id="password" type="password" name="password" placeholder="Введите пароль" value="<?=isset($_POST['password'])  ? screening_txt($_POST['password']) : ''?>">
                <span class="form__error"><?=isset($errors['password'])  ? $errors['password'] : ''?></span>
            </div>
            <button type="submit" class="button">Войти</button>
        </form>
    </main>