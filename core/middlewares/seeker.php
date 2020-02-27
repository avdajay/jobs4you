<?php

if ($_SESSION['rid'] != 1)
{
    return redirect('main');
}