<?php

if ($_SESSION['rid'] == 0) {
    return redirect('admin');
} elseif ($_SESSION['rid' == 1]) {
    return redirect('main');
} else {
    return;
}
