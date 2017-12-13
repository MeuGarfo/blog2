<form class="" action="/posts?create" method="post">
    <input type="text" name="title" placeholder="Título">
    <input type="text" name="description" placeholder="Descrição">
    <select name="category_id">
        <option value="1">Post</option>
    </select>
    <textarea name="post" rows="8" cols="80"></textarea>
    <select name="online">
        <option value="0" selected>Offline</option>
        <option value="1">Online</option>
    </select>
    <label for="cover">Imagem de exibição</label>
    <input type="file" name="cover" id="cover">
</form>
