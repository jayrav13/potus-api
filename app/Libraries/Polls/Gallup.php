<?php

namespace App\Libraries\Polls;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Gallup
{
	public static function scrape()
	{
		$process = new Process("python " . base_path() . "/storage/scripts/polls/live/gallup.py");
		$process->run();

		if (!$process->isSuccessful()) {
		    return [];
		}

		return json_decode($process->getOutput());
	}
}