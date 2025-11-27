<?php

namespace MediaWiki\Extension\PinyinSort;

use MediaWiki\Extension\PinyinSort\PinyinCollation;

class Hooks
{
	private const VALID_COLLATIONS = [
		'pinyin',
		'pinyin-noprefix'
	];

	public static function onFactory($collationName, &$collationObj)
	{
		if (in_array($collationName, self::VALID_COLLATIONS)) {
			$collationObj = new PinyinCollation(
				$collationName === 'pinyin-noprefix'
			);
		}
		return true;
	}
}
