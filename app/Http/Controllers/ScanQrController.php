<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GeneratedOtp;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ScanQrController extends Controller
{
    public function ScanQr()
    {
        return view('student.student-scan-qr');
    }

    public function ScanQrCode()
    {
        return view('student.student-scan-qr-code');
    }

    public function handleScannedData(Request $request)
    {
        // Retrieve the scanned data from the request
        $scannedData = $request->input('scannedData');

        // Call the extractPhraseFromUrl function
        $otpOnly = $this->extractPhraseFromUrl($scannedData);

        // Process the scanned data as needed
        // For example, you can save it to the database or perform any other operations

        if ($otpOnly) {
            // Retrieve all records from the generated_otps table
            $generatedOtps = GeneratedOtp::all();
            foreach ($generatedOtps as $otp) {
                $otp = $otp->otp;
                if ($otpOnly == $otp) {
                    $varified = $otp;
                    // Store the scanned data in the session
                    $request->session()->put('varified', $varified);
                    return response()->json(['success' => true]);
                }
            }
        }
        return response()->json(['fail' => true]);
    }


    public function extractPhraseFromUrl($url)
    {
        $queryParams = parse_url($url, PHP_URL_QUERY);
        parse_str($queryParams, $queryData);

        if (isset($queryData['otpPin'])) {
            return $queryData['otpPin'];
        }

        return null;
    }
}
