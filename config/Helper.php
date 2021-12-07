<?php
use Config\Arr;

function data_get($target, $key, $default = null){
	if (is_null($key)) {
		return $target;
	}

	$key = is_array($key) ? $key : explode('.', $key);

	foreach ($key as $i => $segment) {
		unset($key[$i]);

		if (is_null($segment)) {
			return $target;
		}

		if ($segment === '*') {
			if ($target instanceof Collection) {
				$target = $target->all();
			} elseif (! is_array($target)) {
				return value($default);
			}

			$result = [];

			foreach ($target as $item) {
				$result[] = data_get($item, $key);
			}

			return in_array('*', $key) ? Arr::collapse($result) : $result;
		}

		if (Arr::accessible($target) && Arr::exists($target, $segment)) {
			$target = $target[$segment];
		} elseif (is_object($target) && isset($target->{$segment})) {
			$target = $target->{$segment};
		} else {
			return value($default);
		}
	}

	return $target;
}
?>