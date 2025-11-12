<?php define('undefined', 'undefined');require __DIR__.'/../driver.inc.php';
$content = file_get_contents(__DIR__."/../nodes/ParentNode-querySelectorAll-removed-elements.html");
$document = Dom\HTMLDocument::createFromString($content);
;
"use strict";
;
test(function() { global $document;
;
$container = $document->querySelector("#container");

function getIDs($container) {
  return array_map(fn($el) => $el->id, [...$container->querySelectorAll("a.test")]);
};
;
$container->innerHTML = '<a id="link-a" class="test">a link</a>';
assert_array_equals(getIDs($container), ["link-a"], "Sanity check: initial setup");
;
$container->innerHTML = '<a id="link-b" class="test"><img src="foo$->jpg"></a>';
assert_array_equals(getIDs($container), ["link-b"], "After replacement");
;
$container->innerHTML = '<a id="link-a" class="test">a link</a>';
assert_array_equals(getIDs($container), ["link-a"], "After changing back to the original HTML");

});
