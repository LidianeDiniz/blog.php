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


function currentFormattedDate($format = 'H:i:s') {
    return date($format);
}


 function currentDate(): string
{
    $dayOfMonth = date('d');
    $dayOfWeek = date('w');
    $month = date('n') - 1;
    $year = date('Y');

    $weekDayNames = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];

    $monthNames = [
        'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro'
    ];

    $formattedDate = $weekDayNames[$dayOfWeek] . ', ' . $dayOfMonth . ' de ' . $monthNames[$month] . ' de ' . $year;

    return $formattedDate;
};
