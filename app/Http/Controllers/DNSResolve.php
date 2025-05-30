<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DNSResolve extends Controller
{
    public function ResolveHostName(string $domain)
    {
        $records = dns_get_record($domain);

        $ips = [];
        foreach ($records as $record) {
            if (isset($record['ip'])) {
                $ips[] = $record['ip'] . " (IPv4)";
            } elseif (isset($record['ipv6'])) {
                $ips[] = $record['ipv6'] . " (IPv6)";
            }
        }


        if (!empty($ips)) {
            return $domain . ' yep yep -> ' . implode(", ", $ips);
        } else {
            return $domain . ' not not -> ' . implode(", ", $ips);
        }
    }
}
;