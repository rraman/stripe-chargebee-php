<?php

$wildeQuotes = array(
  "A little sincerity is a dangerous thing, and a great deal of it is absolutely fatal.",
  "Always forgive your enemies; nothing annoys them so much.",
  "America is the only country that went from barbarism to decadence without civilization in between.",
  "I think that God in creating Man somewhat overestimated his ability.",
  "I am not young enough to know everything.",
  "Fashion is a form of ugliness so intolerable that we have to alter it every six months.",
  "Most modern calendars mar the sweet simplicity of our lives by reminding us that each day that passes is the anniversary of some perfectly uninteresting event.",
  "Scandal is gossip made tedious by morality."
  );

echo "<h1>Here's your quote!</h1>";
echo "<h2>".$wildeQuotes[array_rand($wildeQuotes)]."</h2>";

?>