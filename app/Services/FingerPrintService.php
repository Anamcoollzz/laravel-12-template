<?php

namespace App\Services;

use App\Models\FingerprintMachine;

class FingerPrintService
{

    const NO_IP = 'no_ip';
    const ERROR_CONNECT = 'error_connect';

    /**
     * get log dari mesin sidik jari X105 ID
     *
     * @return string
     */
    public function getUserLog105Id(): string
    {
        if (request('ip')) {
            $IP = request('ip');
            $Key = request('key');
            $id = request('id');
            $fn = request('fn');

            if ($IP == '') {
                $IP = '192.168.1.201';
            }
            if ($Key == '') {
                $Key = '0';
            }
            if ($id == '') {
                $id = '1';
            }
            if ($fn == '') {
                $fn = '0';
            }

            $soap_request = '<GetUserInfo>
                                <ArgComKey Xsi:type="xsd:integer"> ' . $Key . ' </ArgComKey>
                                <Arg>
                                <PIN Xsi:type="xsd:integer"> 10005 </PIN>
                                </Arg>
                                </GetUserInfo>';

            $Connect = fsockopen($IP, "80", $errno, $errstr, 1);
            if ($Connect) {
                $newLine = "\r\n";
                fputs($Connect, "POST /iWsService HTTP/1.0" . $newLine);
                fputs($Connect, "Content-Type: text/xml" . $newLine);
                fputs($Connect, "Content-Length: " . strlen($soap_request) . $newLine . $newLine);
                fputs($Connect, $soap_request . $newLine);
                $buffer = "";
                while ($Response = fgets($Connect, 1024)) {
                    $buffer = $buffer . $Response;
                }
                return $buffer;
            }
            return self::ERROR_CONNECT;
        }
        return self::NO_IP;
    }

    public function getAttendanceLog105Id(?bool $isDummy = false, FingerprintMachine $fingerprintMachine = null): string
    {

        if ($isDummy) {
            return file_get_contents(database_path('seeders/data/f.log'));
        }

        if ($fingerprintMachine) {
            $IP = request('ip', $fingerprintMachine->ip);
            $Key = request('key', $fingerprintMachine->key);
            $id  = request('id', $fingerprintMachine->machine_id);
            $fn  = request('fn', $fingerprintMachine->fn);

            if ($IP == '') {
                $IP = '192.168.1.201';
            }
            if ($Key == '') {
                $Key = '0';
            }
            if ($id == '') {
                $id = '1';
            }
            if ($fn == '') {
                $fn = '0';
            }
            $Connect = fsockopen($IP, "80", $errno, $errstr, 1);
            if ($Connect) {
                $soap_request = "<GetAttLog><ArgComKey xsi:type=\"xsd:integer\">" . $Key . "</ArgComKey><Arg><PIN xsi:type=\"xsd:integer\">All</PIN></Arg></GetAttLog>";
                $newLine = "\r\n";
                fputs($Connect, "POST /iWsService HTTP/1.0" . $newLine);
                fputs($Connect, "Content-Type: text/xml" . $newLine);
                fputs($Connect, "Content-Length: " . strlen($soap_request) . $newLine . $newLine);
                fputs($Connect, $soap_request . $newLine);
                $buffer = "";
                while ($Response = fgets($Connect, 1024)) {
                    $buffer = $buffer . $Response;
                }
                return $buffer;
            } else return 'error_connect';
        }
        return 'no_ip';
    }

    public function parseAll(string $log = ''): \Illuminate\Support\Collection
    {
        if ($log) {
            $buffer = $log;
        } else {
            // $buffer = file_get_contents(database_path('seeders/data/attendance_log.xml'));
        }
        // $buffer = $this->parse($buffer, "<GetAttLogResponse>", "</GetAttLogResponse>");
        // $buffer = explode("\r\n", $buffer);
        // $buffer = explode("\n", $buffer);
        // dd($buffer);

        $raw = $buffer; // isi full dari mesin

        // ambil isi di dalam <GetAttLogResponse>...</GetAttLogResponse>
        $buffer = $this->parse($raw, "<GetAttLogResponse>", "</GetAttLogResponse>");
        // dd($buffer);
        // Biar jadi XML valid, kasih root tambahan
        $xmlString = "<Root><GetAttLogResponse>" . $buffer . "</GetAttLogResponse></Root>";

        $xml = simplexml_load_string($xmlString);

        $logs = [];
        foreach ($xml->GetAttLogResponse->Row as $row) {
            // if ($row->PIN)
            //     $logs[] = FingerPrintX105Id::updateOrCreate([
            //         'pin'      => (string) $row->PIN,
            //         'datetime' => (string) $row->DateTime,
            //         'verified' => (int) $row->Verified,
            //         'status'   => (int) $row->Status,
            //     ], []);
            $logs[] = $row;
        }

        return collect($logs);

        // $logs udah array enak buat di-insert ke DB
        $arr = [];
        for ($a = 0; $a < count($buffer); $a++) {
            $data     = $this->parse($buffer[$a], "<Row>", "</Row>");
            $PIN      = $this->parse($data, "<PIN>", "</PIN>");
            $DateTime = $this->parse($data, "<DateTime>", "</DateTime>");
            $Verified = $this->parse($data, "<Verified>", "</Verified>");
            $Status   = $this->parse($data, "<Status>", "</Status>");
            $arr[]    = [
                'pin' => $PIN,
                'date_time' => $DateTime,
                'verified' => $Verified,
                'status' => $Status,
            ];
        }
        return collect($arr);
    }

    /**
     * parse string antara dua parameter
     *
     * @param string $data
     * @param string $p1
     * @param string $p2
     * @return string
     */
    private function parse($data, $p1, $p2)
    {
        $data = " " . $data;
        $hasil = "";
        $awal = strpos($data, $p1);
        if ($awal != "") {
            $akhir = strpos(strstr($data, $p1), $p2);
            if ($akhir != "") {
                $hasil = substr($data, $awal + strlen($p1), $akhir - strlen($p1));
            }
        }
        return $hasil;
    }
}
