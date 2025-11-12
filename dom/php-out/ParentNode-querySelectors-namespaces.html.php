<?php define('undefined', 'undefined');require __DIR__.'/../driver.inc.php';
$content = file_get_contents(__DIR__."/../nodes/ParentNode-querySelectors-namespaces.html");
$document = Dom\HTMLDocument::createFromString($content);
;
"use strict";
;
test(function() { global $document; global $el;
;
$el = $document->getElementById("thesvg");
;
assert_equals($document->querySelector("[*|href]"), $el);
assert_array_equals($document->querySelectorAll("[*|href]"), [$el]);

});
