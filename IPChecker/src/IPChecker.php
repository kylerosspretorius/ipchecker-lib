<?php

namespace KylePretorius\IPChecker;


class IPChecker
{

    private $ipRanges;

    static public function init($ranges = [])
    {
        return new self($ranges);
    }

    public function __construct($ranges = [])
    {
        if (empty($ranges) || !is_array($ranges)) {
            throw new \Exception('No data has been passed to constructor');
        }

        $this->ipRanges = [];
        foreach ($ranges as $row) {
            $content = trim($row);
            if (!empty($content)) {
                $rangeSplit = explode('/', $content);
                $this->ipRanges[] = ['netAddr' => trim($rangeSplit[0]), 'netMask' => trim($rangeSplit[1])];
            }
        }
    }

    public function check($ip)
    {
        if (empty($this->ipRanges)) {
            return false;
        }
        foreach ($this->ipRanges as $range) {
            if ($this->ipInNetwork($ip, $range['netAddr'], $range['netMask'])) {
                return true;
            }
        }

        return false;
    }

    private function ipInNetwork($ip, $netAddr, $netMask)
    {
        if ($netMask <= 0) {
            return false;
        }
        $ipBinaryString = sprintf("%032b", ip2long($ip));
        $netBinaryString = sprintf("%032b", ip2long($netAddr));

        return (substr_compare($ipBinaryString, $netBinaryString, 0, $netMask) === 0);
    }

}