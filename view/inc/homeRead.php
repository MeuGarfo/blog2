<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Filtrar pelo titulo">
<?php
if (isset($posts) && is_array($posts) && count($posts)>0) {
    print '<ul id="myUL">';
    foreach ($posts as $post) {
        $postRead='/posts/'.$post['slug'].'/'.$post['id'];
        $data=strftime("%A, %d de %B de %Y | %H:%M", $post['created_at']);
        $data=ucfirst($data);
        print '<li>';
        print '<small>'.$data.'</small><br>';
        print '<a href="'.$postRead.'">'.$post['title'].'</a>';
        print '</li>'.PHP_EOL;
    }
    print '</ul>';
} else {
    print 'Nenhum post encontrado';
}
?>
<script type="text/javascript">
function myFunction() {
    //https://www.w3schools.com/howto/howto_js_filter_lists.asp
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
