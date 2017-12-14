<form class="" action="/posts?create" method="post" id="postCreate">>
    <input type="text" name="title" placeholder="Título" id="postTitle">
    <select name="category_id">
        <option value="1">Post</option>
    </select>
    <div class="btn-group" id="toolbar">
        <button type="button" id="h2" onclick="editor(this.id)">h2</button>
        <button type="button" id="h3" onclick="editor(this.id)">h3</button>
        <button type="button" id="italic" onclick="editor(this.id)">i</button>
        <button type="button" id="insertOrderedList" onclick="editor(this.id)">ol</button>
        <button type="button" id="insertUnorderedList" onclick="editor(this.id)">ul</button>
        <button type="button" id="justifyCenter" onclick="editor(this.id)">center</button>
        <button type="button" id="InsertImage" onclick="editor(this.id)">img</button>
        <button type="button" id="CreateLink" onclick="editor(this.id)">a</button>
        <button type="button" id="CreateTable" onclick="editor(this.id)">table</button>
        <button type="button" id="html" onclick="editor(this.id)">html</button>
    </div>
    <div class="well" id="editor" contenteditable="true" tabindex="2"></div>
    <input type="hidden" name="content" id="content">
    <select name="online">
        <option value="0" selected>Offline</option>
        <option value="1">Online</option>
    </select>
    <button type="submit">Criar post</button>
</form>
<script type="text/javascript">
 $(function(){
     $('#postTitle').focus();
     $('#postCreate').on('submit',function(){
         if(!showSource){
             editor('html');
         }
         $('#content').attr('value', $('#editor').html());
     });
 });
 </script>
