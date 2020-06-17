<?php

namespace Website\Controllers;

/**
 * Class WebsiteController
 *
 * Videopagina
 */
class VideoController {

	public function videoPage() {

		$template_engine = get_template_engine();
		echo $template_engine->render('video_page');

	}

}