<?php



function isLocalhost(): bool
{
    $server = filter_input(INPUT_SERVER, 'SERVER_NAME');

    if ($server == 'localhost') {
        return true;
    }
    return false;
}

function generateUrl(string $url = null): string
{
    $server = filter_input(INPUT_SERVER, 'SERVER_NAME');
    $environment = ($server == 'localhost' ? DEVELOPMENT_URL : '');

    if (!empty($url)) {
        if (str_starts_with($url, '/')) {
            return $environment . $url;
        }
    }
    
    return $environment . '/' . $url;
}
