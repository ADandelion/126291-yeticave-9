<?php if(!$showPage): ?>
    <ul class="pagination-list">

        <li class="pagination-item pagination-item-prev "><a <?php if($currentPage === 1):?>class="not-active-item" <?php endif; ?>  href="?search=<?=$_GET['search']; ?>&page=<?=$currentPage - 1; ?>">Назад</a></li>

        <?php foreach ($pages as  $page): ?>

            <li class="pagination-item <?php if ($page === $currentPage): ?> pagination-item-active <?php endif;?>">
                <a href="?search=<?=$_GET['search']; ?>&page=<?=$page; ?>"><?=$page; ?></a>
            </li>
        <?php endforeach; ?>

        <li class="pagination-item pagination-item-next"><a <?php if($currentPage >= array_pop($pages)):?>class="not-active-item"  <?php endif; ?> href="?search=<?=$_GET['search']; ?>&page=<?=$currentPage + 1; ?>">Вперед</a></li>
    </ul>
<?php endif;?>