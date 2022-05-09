<?php
namespace app\helpers;

/**
 * Class FileHelper
 * @package app\helpers
 */
class FileHelper {

    /**
     * export csv file.
     */
    public static function exportCsvFile($fileName = '', $header = [], $data = [])
    {
        // output headers so that the file is downloaded rather than displayed
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        // do not cache the file
        header('Pragma: no-cache');
        header('Expires: 0');

        // create a file pointer connected to the output stream
        $file = fopen('php://output', 'w');

        // send the column headers
        fputcsv($file, array_values($header));

        // output each row of the data
        foreach ($data as $d)
        {
            $row = [];

            foreach ($header as $k=>$h) {
                $row[$k] = $d[$k] ?? '';
            }

            fputcsv($file, $row);
        }

        exit();
    }
}
