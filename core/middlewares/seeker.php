<?php

if ($_SESSION['rid'] == 0) {
    return redirect('admin');
} elseif ($_SESSION['rid'] == 2) {
    return redirect('main');
} else {
    return;
}
