<h2>Posts</h2>
<?php
if (isset($posts) && is_array($posts) && count($posts)>0) {
    print '<ul>';
    foreach ($posts as $post) {
        $postRead='/posts/'.$post['slug'].'/'.$post['id'];
        $postUpdate=$postRead.'?update';
        $postDelete='javascript:postDelete(\''.$post['id'].'\');';
        print '<li>';
        print '<a href="'.$postUpdate.'">Editar</a> |';
        print ' <a href="'.$postDelete.'">Apagar</a> |';
        print ' <a href="'.$postRead.'">'.$post['title'].'</a>';
        print '</li>';
    }
    print '</ul>';
} else {
    print 'Nenhum post encontrado';
}
?>
<script type="text/javascript">
var data={'id':12};
var out=$().ajax('/','GET',data);
</script>
