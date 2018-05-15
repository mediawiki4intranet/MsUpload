<?php

class MsUpload {

	static function start() {
		global $wgOut, $wgScriptPath, $wgJsMimeType, $wgMSL_FileTypes, $wgMSU_useMsLinks, $wgMSU_showAutoCat, $wgMSU_autoIndex, $wgMSU_checkAutoCat, $wgMSU_confirmReplace, $wgMSU_useDragDrop, $wgMSU_imgParams, $wgFileExtensions;

		$wgOut->addModules( 'ext.MsUpload' );

		if ( $wgMSU_imgParams ) {
			$wgMSU_imgParams = '|' . $wgMSU_imgParams;
		}

		$msuVars = array(
			'path' => $wgScriptPath . '/extensions/MsUpload',
			'useDragDrop' => $wgMSU_useDragDrop,
			'showAutoCat' => $wgMSU_showAutoCat,
			'checkAutoCat' => $wgMSU_checkAutoCat,
			'useMsLinks' => $wgMSU_useMsLinks,
			'confirmReplace' => $wgMSU_confirmReplace,
			'imgParams' => $wgMSU_imgParams,
			//'autoIndex' => $wgMSU_autoIndex,
		);

		$wgOut->addJsConfigVars( array(
			'wgFileExtensions' => array_values( array_unique( $wgFileExtensions ) ),
			'msuVars' => $msuVars,
		));

		return true;
	}

	static function wikiEditor()
	{
		global $wgOut, $wgResourceModules;
		if (in_array('ext.wikiEditor.toolbar', $wgOut->getModules()))
		{
			$wgOut->addModules('ext.MsUpload.wikiEditor');
			self::start();
		}
		return true;
	}
}
