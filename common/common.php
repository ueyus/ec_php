<?php
	function sanitize($before) {
		$after = [];
		foreach ($before as $key => $value) {
			$after[$key] = htmlspecialchars($value);
		}
		return $after;
	}

	function pull_year() {
		$min = 2017;
		$max = 2019;
		print '<select name="year">';
		for ($i = $min; $i <= $max; $i++) {
			print '<option value="' . $i . '">' . $i . '</option>';
		}
		print '</select>';
	}

?>