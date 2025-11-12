<?php define('undefined', 'undefined');require __DIR__.'/../driver.inc.php';
$content = file_get_contents(__DIR__."/../nodes/ParentNode-querySelectors-exclusive.html");
$document = Dom\HTMLDocument::createFromString($content);
;
"use strict";
;
test(function() { global $document;
;
$button = $document->createElement("button");
;
assert_equals($button->querySelector("*"), null, "querySelector, '*', before modification");
assert_equals($button->querySelector("button"), null, "querySelector, 'button', before modification");
assert_equals($button->querySelector("button, span"), null, "querySelector, 'button, span', before modification");
assert_array_equals($button->querySelectorAll("*"), [], "querySelectorAll, '*', before modification");
assert_array_equals($button->querySelectorAll("button"), [], "querySelectorAll, 'button', before modification");
assert_array_equals(
  $button->querySelectorAll("button, span"), [],
  "querySelectorAll, 'button, span', before modification"
);
;
;
$button->innerHTML = "text";
;
assert_equals($button->querySelector("*"), null, "querySelector, '*', after modification");
assert_equals($button->querySelector("button"), null, "querySelector, 'button', after modification");
assert_equals($button->querySelector("button, span"), null, "querySelector, 'button, span', after modification");
assert_array_equals($button->querySelectorAll("*"), [], "querySelectorAll, '*', after modification");
assert_array_equals($button->querySelectorAll("button"), [], "querySelectorAll, 'button', after modification");
assert_array_equals(
  $button->querySelectorAll("button, span"), [],
  "querySelectorAll, 'button, span', after modification"
);

});
