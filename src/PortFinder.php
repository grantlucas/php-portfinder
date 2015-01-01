<?php

namespace GrantLucas;

/**
 * PortFinder
 *
 * A simple tool for finding an available port within a range.
 */
class PortFinder
{
    /**
     * Range
     *
     * Return the first available port for a host within a range inclusive of the
     * start and end.
     *
     * @param string $host The host to check for available ports on
     * @param int $start The starting port
     * @param int $end The end port
     *
     * @return mixed Returns an integer or false if no available port is found
     */
    public static function range($host, $start, $end)
    {
        $port = $start;

        while ($port >= $start && $port <= $end) {
            $errno = null;
            $errstr = null;

            $connection = fsockopen($host, $port, $errno, $errstr);

            if (is_resource($connection)) {
                // Port is in use so close the connection and move on
                fclose($connection);

            } else {
                // Port is available
                return $port;
            }

            // Move on to the next port
            $port++;
        }

        // Failed to find an available port by this point
        return false;
    }
}
