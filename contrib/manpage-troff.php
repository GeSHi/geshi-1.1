<?php
require_once dirname(__FILE__) . '/../class.geshi.php';
$geshi = new GeSHi(file_get_contents(__FILE__), 'php');
require_once GESHI_CLASSES_ROOT . 'class.geshirenderer.php';
require_once GESHI_CLASSES_ROOT . 'renderers/class.geshirenderertroff.php';
$geshi->setRenderer(new GeSHiRendererTroff());

$highlighted = $geshi->parseCode();
$manpage = <<<MAN
.TH DemoManPage
.SH EXAMPLE
$highlighted
MAN;

file_put_contents('test-manpage', $manpage);

echo "run 'man ./test-manpage' now!\n";
?>