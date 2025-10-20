<?php

namespace MediaWiki\Extension\PinyinSort;

use MediaWiki\Extension\PinyinSort\ConversionTable;

class Converter
{
	public static function zh2pinyin($string)
	{
		$transliterator = \Transliterator::create('Han-Latin; Latin-ASCII');

		return preg_replace_callback(
			'/\p{Han}/u',
			fn($matches) => ucfirst($transliterator->transliterate($matches[0])),
			$string
		);
	}
}
