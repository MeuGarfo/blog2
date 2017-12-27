<h2>Posts</h2>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Filtrar pelo titulo">
<?php
if (isset($posts) && is_array($posts) && count($posts)>0) {
    print '<ul id="myUL">';
    foreach ($posts as $post) {
        $postRead='/posts/'.$post['slug'].'/'.$post['id'];
        $postUpdate=$postRead.'?update';
        $postDelete='javascript:postDelete(\''.$post['id'].'\');';
        print '<li>';
        print '<a href="'.$postUpdate.'">Editar</a> |';
        print ' <a class="postDeleteLink" href="'.$postDelete.'">Apagar</a> |';
        if ($post['online']) {
            print ' <b class="green">ON</b> |';
        } else {
            print ' <b class="red">OFF</b> |';
        }
        print ' <a href="'.$postRead.'">'.$post['title'].'</a>';
        print '</li>'.PHP_EOL;
    }
    print '</ul>';
} else {
    print 'Nenhum post encontrado';
    var_dump($posts);
}
?>
<script type="text/javascript">
function postDelete(id){
    var url='/posts/'+id+'?delete';
    if(confirm("Deseja realmente apagar o post "+id+"?")){
        $.post(url, function(data, status){
            window.location.href = '/posts';
        });
    }
}
function myFunction() {
    //https://www.w3schools.com/howto/howto_js_filter_lists.asp
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[2];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
