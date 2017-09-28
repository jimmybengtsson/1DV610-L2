<?php

namespace View;

class DateTimeView
{
    public function show()
    {
        $today = getdate();

		$timeString = $today['weekday'] . ', the ' . $this->checkDayOfMonth($today['mday']) . ' of ' . $today['month'] . ' ' .
            $today['year'] . ', The time is ' . date("H:i:s");

		return '<p>' . $timeString . '</p>';
	}

    private function checkDayOfMonth($monthDay)
    {
        if ($monthDay == 1 || $monthDay == 21 || $monthDay == 31) {

            return $monthDay . 'st';

        } else if ($monthDay == 2 || $monthDay == 22) {

            return $monthDay . 'nd';

        } else if ($monthDay == 3 || $monthDay == 23) {

            return $monthDay . 'rd';

        } else {

            return $monthDay . 'th';
        }
    }
}