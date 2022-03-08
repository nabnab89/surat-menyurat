<!DOCTYPE html>
<html>

<head>
    <title>Surat Keterangan</title>
    <style>
        p {
            font-size: 12pt
        }

        td {
            font-weight: 100
        }

        .mt-05 {
            margin-top: 0.5cm;
        }

        .mt-1 {
            margin-top: 1cm;
        }

        .mt-2 {
            margin-top: 2cm;
        }

        .mt-5 {
            margin-top: 5cm;
        }

        .container {
            margin-left: 0.5cm;
            margin-top: 0cm;
            margin-right: 0.5cm;
            margin-bottom: 1.5cm;
        }

        td {
            vertical-align: top;
        }

        .point {
            width: 1cm;
        }

        .justify {
            text-align: justify;
        }

        .page_break {
            page-break-before: always;
        }

        .text {
            font-size: 11pt;
            line-height: 25px;
        }

    </style>
</head>

<body>

    <div class="container">
        <center>
            <table style="margin-left: 1.2cm">
                <tr>
                    <td>
                        <img src="{{ public_path('assets/images/logo.png') }}" style="width:2.5cm;">
                    </td>
                    <td>
                        <center style="margin-top: -10px">
                            <p style="font-size: 14pt">
                                PEMERINTAH KABUPATEN PONOROGO <br>
                                DINAS PENDIDIKAN <br>
                                <span style="font-size: 16pt">
                                    <b>SMP NEGERI 1 SLAHUNG</b>
                                </span>
                            </p>
                            <p style="font-size: 10pt; margin-top: -15px">Jl. Raya Pacitan 9 Menggare, Slahung,
                                Ponorogo.
                                Telp. (0352) 371166
                                <br>
                                <span style="font-size: 16pt; letter-spacing: 3pt">
                                    <b>SLAHUNG</b>
                                </span>
                            </p>
                        </center>
                    </td>
                </tr>
            </table>
            <hr style="margin-top: -0.3cm">
        </center>
        <br />
        <center style="margin-top: -1cm">
            <p style="word-spacing: 0.8cm">
                <b>LEMBAR DISPOSISI</b>
            </p>
        </center>
        <table style="border: solid; width: max-content; padding: 10px">
            <tbody>
                <tr>
                    <td style="text-align: right; padding-right: 20px;">Rahasia</td>
                    <td style="border: solid; width: 3cm; text-align: center">
                        {{ $surat->information == 1 ? 'V' : '' }}</td>
                    <td style="text-align: right; padding-right: 20px;">Penting</td>
                    <td style="border: solid; width: 3cm; text-align: center">
                        {{ $surat->information == 2 ? 'V' : '' }}</td>
                    <td style="text-align: right; padding-right: 20px;">Rutin</td>
                    <td style="border: solid; width: 3cm; text-align: center">
                        {{ $surat->information == 3 ? 'V' : '' }}</td>
                </tr>
            </tbody>
        </table>
        <table style="border: solid; width: max-content; padding: 10px; margin-top: -2.4px">
            <tbody>
                <tr>
                    <td style="width: 3cm"><br>Indek</td>
                    <td style="width: 10px"><br>:</td>
                    <td style="width: 8cm"><br>{{ $surat->incoming->number }}</td>
                    <td style="text-align: center">Tanggal Penerimaan <br> {{ $date }}</td>
                </tr>
            </tbody>
        </table>
        <table style="border: solid; width: max-content; padding: 10px; margin-top: -2.4px">
            <tbody>
                <tr>
                    <td style="width: 3cm">Perihal</td>
                    <td style="width: 10px">:</td>
                    <td>{{ $surat->incoming->detail }}</td>
                </tr>
                <tr>
                    <td style="width: 3cm">Tanggal</td>
                    <td style="width: 10px">:</td>
                    <td>{{ $surat->incoming->letter_date }}</td>
                </tr>
                <tr>
                    <td style="width: 3cm">Nomor</td>
                    <td style="width: 10px">:</td>
                    <td>{{ $surat->incoming->letter_number }}</td>
                </tr>
                <tr>
                    <td style="width: 3cm">Asal</td>
                    <td style="width: 10px">:</td>
                    <td>{{ $surat->incoming->from }}</td>
                </tr>
            </tbody>
        </table>
        <table style="border: solid; width: max-content; padding: 10px; margin-top: -2.4px">
            <tbody>
                <tr>
                    <td style="height: 3cm; width: 3cm; border-right: solid">Instruksi <br> {{ $request->instruction }}
                    </td>
                    <td style="height: 3cm; width: 3cm; padding-left: 10px">Diteruskan <br>{{ $name }}</td>
                </tr>
            </tbody>
        </table>
        <table style="border: solid; width: max-content; padding: 10px; margin-top: -2.4px">
            <tbody>
                <tr>
                    <td style="height: 1cm; width: 3cm; border-right: solid">Catatan</td>
                    <td style="height: 1cm; width: 3cm; padding-left: 10px"></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
