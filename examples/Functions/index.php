<?php
require_once './../../lib/Eflib/Functions.php';
?>
<h1>Examples of using Functions.php file</h1>

<p><a href="./..">Back</a></p>

<h2>secondsToEta</h2>
<p>
	secondsToEta(3727);
	<?php pre(secondsToEta(3727)); ?>
</p>

<h2>secondsToEtaString</h2>
<p>
	secondsToEtaString(11111111) : 
	<?php pre(secondsToEtaString(11111111)); ?>
	<br />
	Altered default translatioon for "seconds" part. <br />
	secondsToEtaString(3727, array('seconds' => 'sek'));
	<?php pre(secondsToEtaString(3727, array('seconds' => 'sek'))); ?>
</p>

