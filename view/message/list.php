<?php
if ($messages) {
    print '<ul>';
    foreach ($messages as $msg) {
        print '<li>';
        print '<b>'.$msg['name'].':</b> ';
        print $msg['message'];
        print '</li>';
    }
    print '</ul>';
}
