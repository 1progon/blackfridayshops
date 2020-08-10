<form id="add-site" @submit.prevent="submitFormAddSite">
    <div class="input-group">
        <label for="site-name">Имя сайта</label>
        <input type="text" name="site_name" id="site-name">
    </div>

    <div class="input-group">
        <label for="site-author">Создатель автор</label>
        <input type="text" name="site_author" id="site-author">
    </div>

    <div class="input-group">
        <label for="site-link">Ссылка на сайт</label>
        <input type="text" name="site_link" id="site-link">
    </div>

    <div class="input-group">
        <input type="submit" name="" id="" value="Добавить">
    </div>
</form>
