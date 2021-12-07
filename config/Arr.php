<?php
namespace Config;

use ArrayAccess;

class Arr
{
	public static function pluck($array, $value, $key = null){
		$results = [];
		[$value, $key] = static::explodePluckParameters($value, $key);
		foreach ($array as $item) {
			$itemValue = data_get($item, $value);

			if (is_null($key)) {
				$results[] = $itemValue;
			} else {
				$itemKey = data_get($item, $key);

				if (is_object($itemKey) && method_exists($itemKey, '__toString')) {
					$itemKey = (string) $itemKey;
				}

				$results[$itemKey] = $itemValue;
			}
		}

		return $results;
	}

	protected static function explodePluckParameters($value, $key){
		$value = is_string($value) ? explode('.', $value) : $value;
		$key = is_null($key) || is_array($key) ? $key : explode('.', $key);
		return [$value, $key];
	}

	public static function collapse($array)
    {
        $results = [];

        foreach ($array as $values) {
            if ($values instanceof Collection) {
                $values = $values->all();
            } elseif (! is_array($values)) {
                continue;
            }

            $results[] = $values;
        }

        return array_merge([], ...$results);
    }

    public static function accessible($value)
    {
        return is_array($value) || $value instanceof ArrayAccess;
    }

    public static function exists($array, $key)
    {
        if ($array instanceof Enumerable) {
            return $array->has($key);
        }

        if ($array instanceof ArrayAccess) {
            return $array->offsetExists($key);
        }

        return array_key_exists($key, $array);
    }
}
?>