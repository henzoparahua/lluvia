<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DNSResolve extends Controller
{
    //
    public function ResolveHostName(string $domain)
    {
        $resolveIp = dns_get_record($domain);

        if ($resolveIp !== $domain) {
            return $domain . " yep yep -> " . $resolveIp;
        } else {
            return $domain . " not not -> " . $resolveIp;
        }
    }
}
