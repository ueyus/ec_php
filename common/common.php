<?php
	function sanitize($before) {
		$after = [];
		foreach ($before as $key => $value) {
			$after[$key] = htmlspecialchars($value);
		}
		return $after;
	}

?>