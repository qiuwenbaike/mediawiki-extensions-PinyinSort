<?php

namespace MediaWiki\Extension\PinyinSort;

use Transliterator;

class Converter
{
	public static function zh2pinyin($string)
	{
		$transliterator = Transliterator::create('Han-Latin; Latin-ASCII; [:Nonspacing Mark:] Remove; NFC');

		return preg_replace_callback(
			'/\p{Han}/u',
			fn($matches) => ucfirst($transliterator->transliterate($matches[0])),
			$string
		);
	}
}
