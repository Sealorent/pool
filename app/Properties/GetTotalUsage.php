<?php

namespace App\Properties;

use DateTime;

class GetTotalUsage
{

    static function getTotalUsage($start_date, $end_date)
    {
        // Create DateTime objects from the start and end date strings
        $startDate = new DateTime($start_date);
        $endDate = new DateTime($end_date);

        // Calculate the difference between the start and end dates
        $interval = $startDate->diff($endDate);

        // Get the total number of hours between the dates
        $totalHours = $interval->days * 24 + $interval->h;

        // Assuming you want to calculate the total usage in hours, you can add additional calculations for minutes and seconds if needed
        $totalUsage = $totalHours;

        return $totalUsage . " Jam";
    }
}
