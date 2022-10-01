<?php
// process trigger style
$style = [];
if ($atts['padding']) {
    $padding = explode("|", $atts['padding']);
    $padding = implode("px ", $padding) . "px;";

    $style[] = '--tm-p:' . $padding;
}

if ($atts['margin']) {
    $padding = explode("|", $atts['padding']);
    $padding = implode("px ", $padding) . "px;";

    $style[] = '--tm-m:' . $padding;
}

if ($atts['color']) {
    $style[] = '--tm-color:' . $atts['color'] . ";";
}
if ($atts['hcolor']) {
    $style[] = '--tm-hcolor:' . $atts['hcolor'] . ";";
}

if ($atts['bg']) {
    $style[] = '--tm-bg:' . $atts['bg'] . ";";
}
if ($atts['hbg']) {
    $style[] = '--tm-hbg:' . $atts['hbg'] . ";";
}

if ($atts['b']) {
    $style[] = '--tm-b:' . $atts['b'] . "px solid " . $atts['bcolor'] . ";";
    $style[] = '--tm-hbcolor:' . $atts['hbcolor'] . ";";
}
if ($atts['br']) {
    $style[] = '--tm-br:' . $atts['br'] . "px;";
}

$style = implode(" ", $style);
?>
<a class="tm-trigger" href="javascript:;" data-micromodal-trigger="tm-<?= $atts['id'] ?>" style="<?= $style ?>"><?= $atts['text'] ?></a>