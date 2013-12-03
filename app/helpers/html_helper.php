<?php

function eh($string)
{
    if (!isset($string)) return;
    echo htmlspecialchars($string, ENT_QUOTES);
}

function input_check($string,$length)
{
    $length = $length;
    $format = "/^[^0-9][A-z0-9]{{$length},}/";
	if (!preg_match($format,$string)){
	    return false;
}
	
return true;
}

function session_check()
{
    if(!isset($_SESSION['username'])) {
	header("Location: http://{$_SERVER['HTTP_HOST']}/user/login"); 
	return false;
	}
    return true;
}

function readable_text($s)
{
    $s = htmlspecialchars($s, ENT_QUOTES);
    $s = nl2br($s);
    return $s;
}
function pagination($last_page, $pagenum, $clickable)
{
    $pagination_ctrl = "";

    if ($last_page < 1) {
        $last_page = 1;
    }

    if ($pagenum < 1) {
        $pagenum = 1;
    }
    elseif ($pagenum > $last_page) {
        $pagenum = $last_page;
    }

    if ($last_page != 1) {
        if ($pagenum > 1) {
            $previous = $pagenum - 1;
            $pagination_ctrl .= '<a href = "'.url('', array('page' => $previous)).'">Previous</a>';
        }

        for($i = $pagenum - $clickable; $i < $pagenum; $i++) {
            if ($i > 0) {
                $pagination_ctrl .= '<a href = "'.url('', array('page' => $i)).'">'.$i.'</a>';
            }
        }

        $pagination_ctrl .= ''.$pagenum;

        for ($i = $pagenum + 1; $i <= $last_page; $i++) {
            $pagination_ctrl .= '<a href = "'.url('', array('page' => $i)).'">'.$i.'</a>';
            if ($i >= $pagenum + $clickable) {
                break;
            }
        }

        if ($pagenum != $last_page) {
            $next = $pagenum + 1;
            $pagination_ctrl .= '<a href = "'.url('', array('page' => $next)).'">Next</a>';
        }
    }

    return $pagination_ctrl;
}
