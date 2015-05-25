<?php function benchmark($function, $args = null, $iterations = 1, $timeout = 0)
{
    set_time_limit($timeout);

    if (is_callable($function) === true) {
        list($usec, $sec) = explode(" ", microtime());
        $start = ((float) $usec + (float) $sec);

        for ($i = 1; $i <= $iterations; ++ $i) {
            call_user_func_array($function, (array) $args);
        }

        list($usec, $sec) = explode(" ", microtime());
        $end = ((float) $usec + (float) $sec);

        return round(($end - $start), 4);
    }

    return false;
}

$result = benchmark(function () {
    sleep(3);
});

echo $result;