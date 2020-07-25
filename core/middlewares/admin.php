<?php

if ($_SESSION['rid'] == 0) {
    return;
} else {
    return redirect('main');
}
