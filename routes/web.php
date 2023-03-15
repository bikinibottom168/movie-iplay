<?php

// Auth::routes();

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });


// Route::get('test', function(){
//     $data_json = '[{"name":"The+Rings+of+Power++EP+1","url":"https://client.iamtheme.com/streaming/ZXlKcGRpSTZJakZMYm1wdVVtdDRWelpLTms1NGRWcHJiVk00VGtFOVBTSXNJblpoYkhWbElqb2lXR056UmtORlUwTXJkRUpHZVhWU2VFbFNXbWxoTWpjMlJFbFFVRzljTDI5U1lXaFdhRFpKUzFoc1kxUTRZVk4xWms1M2JHUXJWRzV5Ynpsdk1XdG9aeXN5S3pCUWRrSXJkVTVIZEhacFkyWTVUbWRjTDA1eFVUMDlJaXdpYldGaklqb2lNbU5sWWpGaFltUTRZelJtWmpObFpXUTBaakZtTTJGbE0yWmxaakJtTlRWbE56ZzBNRGt6TkRnd09UVmhOR0psTkRGaU5tRmlOR0psWVRObVpESTJZU0o5?key=eWPuN3wTEFGqLBh86qCyRzqqoUmpSJ2F","select":"iframe","idioma":""},{"name":"The+Rings+of+Power++EP+2","url":"https://client.iamtheme.com/streaming/ZXlKcGRpSTZJbTh4YTNCcmFsUkVWR2MzVm1oSWNIWkpNemhVU0hjOVBTSXNJblpoYkhWbElqb2lRVWxPUlhodU1HRjVhMDE0TXpCWFpGaEdWMmRtWVZKa09YSjZXRXg2UjIxS1RtdFVNbTk1TTBGR2FXY3lkMEYzTm1aVVlWaHNVbVp5UkRoSFduQjBNelp4YUhCblNWaG1OVTVQUVhrM2QwRnpWbkZFUjBFOVBTSXNJbTFoWXlJNklqRmpaV00wTVdWak1tVXdNMlU1WkRGbE5tSmxaamhpTUdKbE1tSmpaVFZoTVRkbFpXRXpOakU1T1RVNFltSXpZalV6TUdSalpXTXpZemN6WW1Nd1pXVWlmUT09?key=eWPuN3wTEFGqLBh86qCyRzqqoUmpSJ2F","select":"iframe","idioma":""},{"name":"The+Rings+of+Power++EP+3","url":"https://client.iamtheme.com/streaming/ZXlKcGRpSTZJbnB2TWtSTU5VVTNhelJSV1U1eFp5c3hUbEl6UkVFOVBTSXNJblpoYkhWbElqb2lZMUpZZVdKQllYUXlRMVJDVkRCRlRrRkJWbEpMVlhCbWJVUlpkR05UZG5scFZGSlVXVFpLVUVScmNWTTVNVWRpZEdOb1oyWkVURTlOYTJNME1VUTBRamRoVWs5elNUQkVUemwzUWxSelJVdGpXbUUyUTFFOVBTSXNJbTFoWXlJNkltSTFaRGxrTmpnNE9HWmtNRFU0TTJSbE5qRTVNVGcxT0Rsa09UYzJNbU5oTXpSa1pEa3lORGt6TWpZM1lqVXlaakF3T0RnMVpHUmpNbUl6WXpBelpUa2lmUT09?key=eWPuN3wTEFGqLBh86qCyRzqqoUmpSJ2F","select":"iframe","idioma":""},{"name":"The+Rings+of+Power++EP+4","url":"https://client.iamtheme.com/streaming/ZXlKcGRpSTZJbTUxTTJwT2RsTkJXVXRzTW05d2JFZHZkMnh0VFZFOVBTSXNJblpoYkhWbElqb2labEkyZDB0Rk4zWmNMMU5SWlVwTlV6TnBhR3hGWWpJclUzZFpNSGhIU0hnMFNVa3hWV0ZDYzA4NVdrdDFZWFp3YVRWWVRHeENSMVZKWVN0VGNtbFNaV0pTTlVkelZHUmxkMjVDT0hGcFVHeFVNelZPV1U1UlBUMGlMQ0p0WVdNaU9pSm1ObVJtTjJWbVpXSmtZekkzWVRKa05qVmhNVEJpTW1ObFltRTFaRGc0WVRZM1pXVXdaREF3WXpkbU5qTTVaR00xWVdVelpUUTRNbUV4Wm1ReU16QmtJbjA9?key=eWPuN3wTEFGqLBh86qCyRzqqoUmpSJ2F","select":"iframe","idioma":""},{"name":"The+Rings+of+Power++EP+5","url":"https://client.iamtheme.com/streaming/ZXlKcGRpSTZJbFpOUm5kWFJ6Rm1WRnd2WkVvd1VXWlRZV3RCY0RkblBUMGlMQ0oyWVd4MVpTSTZJa1pyVDNoQmJYY3pZMEprYVhsT1VWWk1ValJuU1hNemRYaHViWGx0VURoTFpUVmhOR3BhY25Gb2RXNUZjV2RXWW5oWlFqVk9aMU5XZW1VNGQzcERYQzlwUWpGUlZIVnllVXNyWWxOM1VraFlXRTEzVFRCT1pVbHVlV1JwVldsbFhDOHhXbmhhVmtoT1lUTkRNbFU5SWl3aWJXRmpJam9pWWpjeFpqUm1aalZpT1dSak5UVTRaV1E1TURNeFpqYzFZelU0WmpobFlqQXhPVEk0Tm1ZeE0yVTNOR1F5TldFeE9HSmlOemsyTURjMU4yWTJZVGd5TmlKOQ==?key=eWPuN3wTEFGqLBh86qCyRzqqoUmpSJ2F","select":"iframe","idioma":""},{"name":"The+Rings+of+Power++EP+6","url":"https://client.iamtheme.com/streaming/ZXlKcGRpSTZJbU5IT0hCUE1rVndSa0pUUlRjNFRsbEhUVmQ1ZUVFOVBTSXNJblpoYkhWbElqb2lSWGxvYjNFMVRITlNVMGgyWVhZM05qSlJaVFV5VFZBMFdIRmxUbXB3UXpSRk9VaHJkbHd2YjA1a1ZUVlpXRlJDWlhoa1IyOVBkVmxIVFRSeWMzSlViRTFTYUhOcWFYcEpZV1pzWkhWek9FcHlaaXRpVldaWWMxRXJRVWRESzJaT1kwUlNPWGRjTDFaNE1VTm5SVDBpTENKdFlXTWlPaUkxTkRRME5qWTFaRFF4WlRKbE0ySTBZbVV3TnprMk5tWTNOVGt3TURnM01EUmtaRGhrTXpVMVpqUmlOemt4T1RkbU5UQXlNVGd5TnpBeU9XUTVNV1V4SW4wPQ==?key=eWPuN3wTEFGqLBh86qCyRzqqoUmpSJ2F","select":"iframe","idioma":""}]';
    

//     $source_series = json_decode($data_json, true);
//     $tmp_source = $source_series;
//     $tmp_count = 1;
//     foreach($tmp_source as $k)
//     {   
//         dd($k);
//         $this->Episodes($k->name,$k->url,$tmp_count);
//         $tmp_count++;
//     }


//     // return json_decode($data_json);
// });