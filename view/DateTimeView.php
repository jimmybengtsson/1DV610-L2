<?php

class DateTimeView {


	public function show() {

        $today = getdate();

		$timeString = $today['weekday'] . ', the ' . $today['mday'] . 'th of ' . $today['month'] . ' ' .
            $today['year'] . ', The time is ' . date("H:i:s");

		return '<p>' . $timeString . '</p>';
	}
}