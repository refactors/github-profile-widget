<?php

if ( ! function_exists( "refactors_HTMLCompressor" ) ) {
	function refactors_HTMLCompressor( $buffer ) {
		$buffer = preg_replace( '/<!--([^\[|(<!)].*)/', '', $buffer );
		$buffer = preg_replace( '/(?<!\S)\/\/\s*[^\r\n]*/', '', $buffer );

		$search = array(
			'/\>[^\S ]+/s',  // strip whitespaces after tags, except space
			'/[^\S ]+\</s',  // strip whitespaces before tags, except space
			'/(\s)+/s'       // shorten multiple whitespace sequences
		);

		$replace = array( '>', '<', '\\1' );

		$buffer = preg_replace( $search, $replace, $buffer );

		return $buffer;
	}
}