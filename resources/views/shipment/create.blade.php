@extends('layouts.layout')
@section('title', 'create Shipment')
@section('content')
    @include('sweetalert::alert')
    <div class="card p-4">
        {{-- <h3>{{ $transaksi_id }}</h3> --}}
        <form action="{{ route('shipment.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <p>(*) Wajib di input!</p> <br>
                <p></p>
                <p class="ml-4">(PDF) File harus berformat PDF!</p>
            </div>
            <table class="table ">
                <tbody>
                    <tr>
                        <td>
                            <h4> <b> 1. General Information </b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <input type="hidden" name="transaksi_id" value="{{ $transaksi_id }}">
                        <td>a. Subjec Of Contract (*)</td>
                        <td><input value="{{ $transaksi->judul_po }}" class="form-control" type="text"
                                name="subject_of_contract" required readonly></td>
                    </tr>
                    <tr>
                        <td>b. Supplier / Vendor (*)</td>
                        <td><input value="{{ old('supplier') }}" class="form-control" type="text" name="supplier"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td>c. Contract No (*)</td>
                        <td><input value="{{ $transaksi->nilai_po }}" class="form-control" type="number" name="contract_no"
                                required readonly></td>
                    </tr>
                    <tr>
                        <td>d. Quantity Contract (*)</td>
                        <td><input value="{{ old('quantity_contract') }}" class="form-control" type="text"
                                name="quantity_contract" required></td>
                    </tr>
                    <tr>
                        <td>e. Quantity Amount (*)</td>
                        <td><select class="form-control" name="contract_amount" id="">
                                <option value="USD">USD</option>
                                <option value="JPY">JPY</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>f. Retention Money (*)</td>
                        <td><input value="{{ old('retention_money') }}" class="form-control" type="text"
                                name="retention_money">
                        </td>
                    </tr>
                    <tr>
                        <td>g. Term of Payment (*)</td>
                        <td><select class="form-control" name="term_of_payment" id="">
                                <option value="TT">TT</option>
                                <option value="LC">LC</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>h. Issuing Bank LC (*)</td>
                        <td><input value="{{ old('issuing_bank_lc') }}" class="form-control" type="text"
                                name="issuing_bank_lc">
                        </td>
                    </tr>
                    <tr>
                        <td>i. Deliery Term Condition (*)</td>
                        <td><select class="form-control" name="delivery_term_condition" id="">
                                <option value="EX work">EX work</option>
                                <option value="FOB">FOB</option>
                                <option value="CFR">CFR</option>
                                <option value="CIF">CIF</option>
                                <option value="DAP">DAP</option>
                                <option value="DDP">DDP</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>j. Requester Section / PIC (*)</td>
                        <td><select class="form-control" name="pic" id="">
                                <option value="section">Section</option>
                                <option value="inisial">Inisial PIC</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>k. Function Of Goods (*)</td>
                        <td><input value="{{ old('function_of_good') }}" class="form-control" type="text"
                                name="function_of_good" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4> <b> 2. Information For Custom Clearence (*)</b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>a. Shipment No (*)</td>
                        <td><input value="{{ old('shipment_no') }}" class="form-control" type="text" name="shipment_no"
                                required></td>

                    </tr>
                    <tr>
                        <td> Shipment Sequence (*)</td>
                        <td><input value="{{ old('shipment_sequence') }}" class="form-control" type="text"
                                name="shipment_sequence" required></td>
                    </tr>
                    <tr>
                        <td>b. Nama Barang (*)</td>
                        <td><input value="{{ old('nama_barang') }}" class="form-control" type="text" name="nama_barang"
                                required></td>
                    </tr>
                    <tr>
                        <td> Nilai Barang (*)</td>
                        <td><input value="{{ $transaksi->total_nilai_import }}" class="form-control" type="number"
                                name="nilai_barang" required readonly></td>
                    </tr>
                    <tr>
                        <td>c. Quantity Delivery (*)</td>
                        <td><input id="quantity_delivery" class="form-control" type="text" name="quantity_delivery"
                                required></td>
                    </tr>
                    <tr>
                        <td>d. Invoice Amount Currency (*)</td>
                        <td><select class="form-control" name="invoice_amount_curr" id="">
                                <option value="USD">USD</option>
                                <option value="JPY">JPY</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </td>

                    </tr>

                    <tr>
                        <td> Invoice amount (*)</td>
                        <td><input value="{{ old('invoice_amount') }}" id="invoice_amount" class="form-control"
                                type="text" name="invoice_amount" required></td>
                    </tr>
                    <tr>
                        <td>e. Quantity Balance (*)</td>
                        <td><input id="quantity_balance" class="form-control" type="number" name="quantity_balance"
                                required readonly></td>
                    </tr>

                    <tr>
                        <td>f. Remaining contract Currency (*)</td>
                        <td><select class="form-control" name="remaining_contract_curr" id="" required>
                                <option value="USD">USD</option>
                                <option value="JPY">JPY</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </td>

                    </tr>

                    <tr>
                        <td> Remaining contract amount (*)</td>
                        <td><input value="{{ old('remaining_contract_amount') }}" id="remaining_amount"
                                class="form-control" type="text" name="remaining_contract_amount" required readonly>
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td>g. Name Of Vessel (*) </td>
                        <td>
                            <input value="{{ old('name_of_vessel') }}" class="form-control" type="text"
                                name="name_of_vessel" required>
                        </td>
                    </tr>
                    <tr>
                        <td>h. Shipper / Exportir (*)</td>
                        <td>
                            <input value="{{ old('shipper') }}" class="form-control" type="text" name="shipper"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td>i. Consignee / Notify party (*)</td>
                        <td>
                            <input value="{{ old('consignee') }}" class="form-control" type="text" name="consignee"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td>j. Issuing Insurance Company (*) </td>
                        <td>
                            <input value="{{ old('issuing_insurance_company') }}" class="form-control" type="text"
                                name="issuing_insurance_company" required>
                        </td>
                    </tr>
                    <tr>
                        <td>k. Amount of Insurance Currency (*)</td>
                        <td><select class="form-control" name="amount_of_insurance_curr" id="" required>
                                <option value="USD">USD</option>
                                <option value="JPY">JPY</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </td>

                    </tr>

                    <tr>
                        <td> Amount of Insurance (*) </td>
                        <td><input value="{{ old('amount_of_insurance') }}" class="form-control" type="text"
                                name="amount_of_insurance" required></td>
                    </tr>
                    <tr>
                        <td>l. Loading Port (*)</td>
                        <td>
                            <input value="{{ old('loading_port') }}" class="form-control" type="text"
                                name="loading_port" required>
                        </td>
                    </tr>
                    <tr>
                        <td>m. ETD Loading Port (*)</td>
                        <td><input value="{{ old('etd_loading_port') }}" class="form-control" type="date"
                                name="etd_loading_port" required>
                        </td>
                    </tr>
                    <tr>
                        <td>n. Unloading Port (*)</td>
                        <td>
                            <input value="{{ old('unloading_port') }}" class="form-control" type="text"
                                name="unloading_port" required>
                        </td>
                    </tr>
                    <tr>
                        <td>o. ETA Unloading Port (*)</td>
                        <td><input value="{{ old('eta_unloading_port') }}" class="form-control" type="date"
                                name="eta_unloading_port" required>
                        </td>
                    </tr>
                    <tr>
                        <td>p. Exp Delivery Time (*)</td>
                        <td><input value="{{ old('exp_delivery_time') }}" class="form-control" type="date"
                                name="exp_delivery_time" required>
                        </td>
                    </tr>
                    {{-- shipping document  --}}
                    <tr>
                        <td>
                            <h4> <b> 3. Shipping Document </b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>a. BL No (*)</td>
                        <td><input value="{{ old('bl_no') }}" class="form-control" type="text" name="bl_no"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-right:10px!important;"> Date (*)</td>
                        <td><input value="{{ old('bl_date') }}" class="form-control" type="date" name="bl_date"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(*, PDF)</small>

                        </td>
                        <td><input value="{{ old('bl_file') }}"
                                class="form-control  @error('bl_file') is-invalid @enderror" type="file"
                                name="bl_file" required>
                            @error('bl_file')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td>b. Invoice No </td>
                        <td><input value="{{ old('invoice_no') }}" class="form-control " type="text"
                                name="invoice_no" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Date </td>
                        <td><input value="{{ old('invoice_date') }}" class="form-control" type="date"
                                name="invoice_date" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(*, PDF)</small>

                        </td>
                        <td><input value="{{ old('invoice_file') }}"
                                class="form-control @error('invoice_file') is-invalid @enderror" type="file"
                                name="invoice_file" required>
                            @error('invoice_file')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>c. Packing List </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td> Date </td>
                        <td><input value="{{ old('packing_date') }}" class="form-control" type="date"
                                name="packing_date" required>

                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(*, PDF)</small>

                        </td>
                        <td><input value="{{ old('packing_file') }}"
                                class="form-control @error('packing_file') is-invalid @enderror" type="file"
                                name="packing_file" required>
                            @error('packing_file')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>d. Cert Of Origin</td>
                        <td><select class="form-control" name="cert_of_origin" id="">
                                <option value="Form D">Form D</option>
                                <option value="E">E</option>
                                <option value="IJEPA">IJEPA</option>
                                <option value="AI">AI</option>
                                <option value="AK">AK</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(PDF)</small>

                        </td>
                        <td><input value="{{ old('cert_of_origin_file') }}"
                                class="form-control @error('cert_of_origin_file') is-invalid @enderror" type="file"
                                name="cert_of_origin_file" required>
                            @error('cert_of_origin_file')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>e. Cert Of Origin Prefensial</td>
                        <td><select class="form-control" name="cert_of_origin_preferensial" id="">
                                <option value="Form D">Form D</option>
                                <option value="E">E</option>
                                <option value="IJEPA">IJEPA</option>
                                <option value="AI">AI</option>
                                <option value="AK">AK</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>( PDF)</small>

                        </td>
                        <td><input value="{{ old('cert_of_origin_preferensial_file') }}"
                                class="form-control @error('cert_of_origin_preferensial_file') is-invalid @enderror"
                                type="file" name="cert_of_origin_preferensial_file" required>
                            @error('cert_of_origin_preferensial_file')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>f. Cert Of Weight (C/W)</td>
                        <td><input value="{{ old('cert_of_weight') }}" class="form-control" type="text"
                                name="cert_of_weight" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(*, PDF)</small>

                        </td>
                        <td><input value="{{ old('cert_of_weight_file') }}"
                                class="form-control @error('cert_of_weight_file') is-invalid @enderror" type="file"
                                name="cert_of_weight_file" required>
                            @error('cert_of_weight_file')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>g. Insurance Document</td>
                        <td><input value="{{ old('insurance_document') }}" class="form-control" type="text"
                                name="insurance_document" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(*, PDF)</small>
                        </td>
                        <td><input value="{{ old('insurance_file') }}"
                                class="form-control @error('insurance_file') is-invalid @enderror" type="file"
                                name="insurance_file" required>
                            @error('insurance_file')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>h. Fumigation Certificate</td>
                        <td><input value="{{ old('fumigation_certificate') }}" class="form-control" type="text"
                                name="fumigation_certificate">
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(PDF)</small>

                        </td>
                        <td><input value="{{ old('fumigation_file') }}"
                                class="form-control @error('fumigation_file') is-invalid @enderror" type="file"
                                name="fumigation_file">
                            @error('fumigation_file')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>i. Letter Of Credit (L/C) No. (*)</td>
                        <td><input value="{{ old('letter_of_credit') }}" class="form-control" type="text"
                                name="letter_of_credit" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Date </td>
                        <td><input value="{{ old('letter_of_credit_date') }}" class="form-control" type="date"
                                name="letter_of_credit_date" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(*, PDF)</small>

                        </td>
                        <td><input value="{{ old('letter_of_credit_file') }}"
                                class="form-control @error('letter_of_credit_file') is-invalid @enderror" type="file"
                                name="letter_of_credit_file" required>
                            @error('letter_of_credit_file')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>j. Doc Budget Of Availabily</td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload
                            <small>(*, PDF)</small>

                        </td>
                        <td><input value="{{ old('doc_budget_of_available_file') }}"
                                class="form-control @error('doc_budget_of_available_file') is-invalid @enderror"
                                type="file" name="doc_budget_of_available_file" required>
                            @error('doc_budget_of_available_file')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4> <b> 4. Goverment Decree </b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>a. SPI Besi & Baja No. & Date.
                            <small>( PDF)</small>
                        </td>
                        <td><input value="{{ old('spi_besi_baja') }}"
                                class="form-control @error('spi_besi_baja') is-invalid @enderror" type="file"
                                name="spi_besi_baja">
                            @error('spi_besi_baja')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>b. Quota Kartu Kendali Atas SPI Besi & Baja No. & Date.
                            <small>(PDF)</small>

                        </td>
                        <td><input value="{{ old('quota_kartu_kendali') }}"
                                class="form-control @error('quota_kartu_kendali') is-invalid @enderror" type="file"
                                name="quota_kartu_kendali">
                            @error('quota_kartu_kendali')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>c. NPIK No. & Date.
                            <small>(PDF)</small>
                        </td>
                        <td><input value="{{ old('npik') }}" class="form-control @error('npik') is-invalid @enderror"
                                type="file" name="npik">
                            @error('npik')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>d. Surat Pengecualin Import Lainnya.
                            <small>( PDF)</small>

                        </td>
                        <td><input value="{{ old('surat_pengecualian_import') }}"
                                class="form-control @error('surat_pengecualian_import') is-invalid @enderror"
                                type="file" name="surat_pengecualian_import">
                            @error('surat_pengecualian_import')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4> <b> 5. Import Duty & Other Tax </b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td> HS No. <small>(*)</small> </td>
                        <td><input value="{{ old('hs_no') }}" class="form-control" type="text" name="hs_no"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td>BM. <small>(*)</small></td>
                        <td><input value="{{ old('bm') }}" class="form-control" type="text" name="bm"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td> PPN. <small>(*)</small></td>
                        <td><input value="{{ old('ppn') }}" class="form-control" type="text" name="ppn"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td> PPH. <small>(*)</small></td>
                        <td><input value="{{ old('pph') }}" class="form-control" type="text" name="pph"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                    </tr>
                </tbody>

            </table>

            @hasanyrole('Admin|User')
                <button type="submit" class="btn btn-primary">Simpan</button>
            @endhasanyrole
        </form>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var totalNilaiImpor = "{{ $transaksi->total_nilai_import }}";
            console.log(totalNilaiImpor)
            var remaining_amount = 0;
            var quantity_balance = 0;
            $('#invoice_amount').on('input', function() {
                var invoice = $(this).val()
                remaining_amount = totalNilaiImpor - invoice
                $('#remaining_amount').val(remaining_amount)

            })
            $('#quantity_delivery').on('input', function() {
                var quantity = $(this).val()
                quantity_balance = totalNilaiImpor - quantity
                $('#quantity_balance').val(quantity_balance)

            })
        })
    </script>
@endsection
