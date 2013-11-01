<?php

echo "Downloading updated XML data from Debian...\n";

echo "Downloading countries...\n";

download(
    'http://git.debian.org/?p=iso-codes/iso-codes.git;a=blob_plain;f=iso_3166/iso_3166.xml;hb=HEAD',
    __DIR__ . '/data/iso-3166-1.xml'
);

echo "Cleaning up countries...\n";

cleanUpCountry(__DIR__  . '/data/iso-3166-1.xml');

echo "Downloading subdivisions...\n";

download(
    'http://git.debian.org/?p=iso-codes/iso-codes.git;a=blob_plain;f=iso_3166_2/iso_3166_2.xml;hb=HEAD',
    __DIR__ . '/data/iso-3166-2.xml'
);

echo "Cleaning up subdivisions...\n";

cleanUpSubdivision(__DIR__ . '/data/iso-3166-2.xml');

/**
 * Cleans up the countries file.
 *
 * @param string $file The countries file.
 */
function cleanUpCountry($file)
{
    $doc = new DOMDocument();
    $doc->formatOutput = true;
    $doc->preserveWhiteSpace = true;

    if (!$doc->load($file)) {
        die("Could not parse: $file");
    }

    $doc->save($file);
}

/**
 * Cleans up the subdivisions file, removing empty subsets.
 *
 * @param string $file The subdivisions file.
 */
function cleanUpSubdivision($file)
{
    $doc = new DOMDocument();
    $doc->formatOutput = true;
    $doc->preserveWhiteSpace = true;

    if (!$doc->load($file)) {
        die("Could not parse: $file");
    }

    $xpath = new DOMXPath($doc);
    $nodes = $xpath->query('//iso_3166_subset[not(./*)]');

    for ($i = 0; $node = $nodes->item($i); $i++) {
        $node->parentNode->removeChild($node);
    }

    $doc->save($file);
}

/**
 * Downloads a file from a remote location.
 *
 * @param string $url  The download URL.
 * @param string $file The output file path.
 */
function download($url, $file)
{
    if (false === ($in = fopen($url, 'r'))) {
        die("Could not open for reading: $url");
    }

    if (false === ($out = fopen($file, 'w'))) {
        fclose($in);

        die("Could not open for writing: $file");
    }

    do {
        if (false !== ($line = fgets($in))) {
            fwrite($out, $line);
        }
    } while (!feof($in));

    fclose($out);
    fclose($in);
}
