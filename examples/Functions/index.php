<?php
require_once './../../lib/Eflib/Functions.php';
?>
<h1>Examples of using Functions.php file<h1>

<h2>secondsToCountDownParts</h2>
<p>
	secondsToCountDownParts(3727);
	<?php pre(secondsToCountDownParts(3727)); ?>
</p>

<h2>secondsToCountDown</h2>
<p>
	secondsToCountDown(11111111) : 
	<?php pre(secondsToCountDown(11111111)); ?>
	<br />
	Altered default translatioon for "seconds" part. <br />
	secondsToCountDown(3727, array('seconds' => 'sek'));
	<?php pre(secondsToCountDown(3727, array('seconds' => 'sek'))); ?>
</p>

