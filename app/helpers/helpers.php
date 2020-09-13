<?php

function is_Active(string $route){
    return null !== request()->segment('3') && request()->segment('3') == $route ? 'active' : '';
}

