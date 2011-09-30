<?php
header("HTTP/1.1 401 Unauthorized");

$text_en = '<em>&mdash; It is not the strongest of the species that survives, nor the most intelligent. It is the one that is the most adaptable to change.</em>';

$text_fr = '<em>&mdash; Les espèces qui survivent ne sont pas les plus fortes, ni les plus intelligentes. mais celles qui s\'adaptent le mieux aux changements.</em>';

$sign = '<em>Charles Darwin / 1809-1882</em>';

$text = $text_en."\n<br /><br />\n".$text_fr."\n<br /><br />\n".$sign;

die($text);
?>