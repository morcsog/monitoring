<?php

declare(strict_types=1);

function profiling(int $elementCounter): void
{
    $startTime = microtime(true);
    $randArr = [];
    for ($i = 0; $i < $elementCounter; $i++) {
        $randArr[] = generateRandomString();

        if ($i % 1000 === 0) {
            echo 'Memory usage (' . $i . '): '. memory_get_usage() . ' bytes' . PHP_EOL;
        }

        if($i % 10000 === 0)
        {
            $htmlContent = file_get_contents('https://example.com');
            $randArr[] = $htmlContent;
        }
    }
    $endTime = microtime(true);
    $elapsedTime = $endTime - $startTime;
    echo 'Elapsed time: ' . $elapsedTime . ' seconds' . PHP_EOL;
}

function generateRandomString($length = 100): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

profiling(300000);