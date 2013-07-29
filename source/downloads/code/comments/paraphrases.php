<?php

# Check if the domain is in the blacklisted domains list
foreach ($blacklistedDomains() as $domain) {
    if (strpos($domainToCheck, $domain) !== false) {
        return true;
    }
}

# complete headers
if (!$headersComplete) {
    completeHeaders();
}