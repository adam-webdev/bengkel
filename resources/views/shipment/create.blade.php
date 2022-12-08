@extends('layouts.layout')
@section('title', 'create Shipment')
@section('content')
    <div class="card p-4">
        <h3>{{ $transaksi_id }}</h3>
        <form action="{{ route('shipment.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <table class="table ">
                <tbody>
                    <tr>
                        <td>
                            <h4> <b> 1. General Information </b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>a. Subjec Of Contract</td>
                        <td><input class="form-control" type="text" name="subject_of_contract" required></td>
                    </tr>
                    <tr>
                        <td>b. Supplier / Vendor</td>
                        <td><input class="form-control" type="text" name="supplier" required></td>
                    </tr>
                    <tr>
                        <td>c. Contract No</td>
                        <td><input class="form-control" type="number" name="contract_no" required></td>
                    </tr>
                    <tr>
                        <td>d. Quantity Contract </td>
                        <td><input class="form-control" type="text" name="quantity_contract" required></td>
                    </tr>
                    <tr>
                        <td>e. Quantity Amount </td>
                        <td><select class="form-control" name="contract_amount" id="">
                                <option value="USD">USD</option>
                                <option value="JPY">JPY</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>f. Retention Money </td>
                        <td><input class="form-control" type="text" name="retention_money">
                        </td>
                    </tr>
                    <tr>
                        <td>g. Term of Payment </td>
                        <td><select class="form-control" name="term_of_payment" id="">
                                <option value="TT">TT</option>
                                <option value="LC">LC</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>h. Issuing Bank LC </td>
                        <td><input class="form-control" type="text" name="issuing_bank_lc">
                        </td>
                    </tr>
                    <tr>
                        <td>i. Deliery Term Condition </td>
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
                        <td>j. Requester Section / PIC </td>
                        <td><select class="form-control" name="term_of_payment" id="">
                                <option value="section">Section</option>
                                <option value="inisial">Inisial PIC</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>k. Function Of Goods</td>
                        <td><input class="form-control" type="text" name="function_of_good" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4> <b> 2. Information For Custom Clearence </b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>a. Shipment No </td>
                        <td><input class="form-control" type="text" name="shipment_no" required></td>

                    </tr>
                    <tr>
                        <td> Shipment Sequence (if Partial)</td>
                        <td><input class="form-control" type="text" name="shipment_sequence" required></td>
                    </tr>
                    <tr>
                        <td>b. Quantity Delivery</td>
                        <td><input class="form-control" type="text" name="quantity_delivery" required></td>
                    </tr>
                    <tr>
                        <td>c. Invoice Amount Currency</td>
                        <td><select class="form-control" name="invoice_amount_curr" id="">
                                <option value="USD">USD</option>
                                <option value="JPY">JPY</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </td>

                    </tr>

                    <tr>
                        <td> Invoice amount</td>
                        <td><input class="form-control" type="text" name="invoice_amount" required></td>
                    </tr>
                    <tr>
                        <td>d. Quantity Balance</td>
                        <td><input class="form-control" type="number" name="quantity_balance" required></td>
                    </tr>

                    <tr>
                        <td>e. Remaining contract Currency</td>
                        <td><select class="form-control" name="remaining_contract_curr" id="">
                                <option value="USD">USD</option>
                                <option value="JPY">JPY</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </td>

                    </tr>

                    <tr>
                        <td> Remaining contract amount</td>
                        <td><input class="form-control" type="text" name="invoice_amount" required></td>
                    </tr>
                    <tr>
                    <tr>
                        <td>f. Name Of Vessel </td>
                        <td>
                            <textarea class="form-control" rows="4" type="text" name="name_of_vessel" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>g. Shipper / Exportir </td>
                        <td>
                            <textarea class="form-control" rows="4" type="text" name="shipper" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>h. Consignee / Notify party </td>
                        <td>
                            <textarea class="form-control" rows="4" type="text" name="consignee" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>i. Issuing Insurance Company </td>
                        <td>
                            <textarea class="form-control" rows="4" type="text" name="issuing_insurance_company" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>j. Amount of Insurance Currency</td>
                        <td><select class="form-control" name="amount_of_insurance_curr" id="">
                                <option value="USD">USD</option>
                                <option value="JPY">JPY</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </td>

                    </tr>

                    <tr>
                        <td>j Amount of Insurance </td>
                        <td><input class="form-control" type="text" name="amount_of_insurance" required></td>
                    </tr>
                    <tr>
                        <td>k. Loading Port </td>
                        <td>
                            <textarea class="form-control" rows="4" type="text" name="loading_port" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>l. ETD Loading Port</td>
                        <td><input class="form-control" type="date" name="etd_loading_port" required>
                        </td>
                    </tr>
                    <tr>
                        <td>m. Unloading Port </td>
                        <td>
                            <textarea class="form-control" rows="4" type="text" name="unloading_port" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>n. ETA Unloading Port</td>
                        <td><input class="form-control" type="date" name="eta_unloading_port" required>
                        </td>
                    </tr>
                    <tr>
                        <td>o. Exp Delivery Time </td>
                        <td><input class="form-control" type="date" name="exp_delivery_time" required>
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
                        <td>a. BL No </td>
                        <td><input class="form-control" type="text" name="bl_no" required>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-right:10px!important;"> Date </td>
                        <td><input class="form-control" type="date" name="bl_date" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload </td>
                        <td><input class="form-control" type="file" name="bl_file" required>
                        </td>
                    </tr>
                    <tr>
                        <td>b. Invoice No </td>
                        <td><input class="form-control" type="text" name="invoice_no" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Date </td>
                        <td><input class="form-control" type="date" name="invoice_date" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload </td>
                        <td><input class="form-control" type="file" name="invoice_file" required>
                        </td>
                    </tr>
                    <tr>
                        <td>c. Packing List </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td> Date </td>
                        <td><input class="form-control" type="date" name="packing_date" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload </td>
                        <td><input class="form-control" type="file" name="packing_file" required>
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
                        <td> Upload </td>
                        <td><input class="form-control" type="file" name="cert_of_origin_file" required>
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
                        <td> Upload </td>
                        <td><input class="form-control" type="file" name="cert_of_origin_preferensial_file" required>
                        </td>
                    </tr>
                    <tr>
                        <td>f. Cert Of Weight (C/W)</td>
                        <td><input class="form-control" type="text" name="cert_of_weight" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload </td>
                        <td><input class="form-control" type="file" name="cert_of_weight_file" required>
                        </td>
                    </tr>
                    <tr>
                        <td>g. Insurance Document</td>
                        <td><input class="form-control" type="text" name="insurance_document" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload </td>
                        <td><input class="form-control" type="file" name="insurance_document_file" required>
                        </td>
                    </tr>
                    <tr>
                        <td>h. Fumigation Certificate</td>
                        <td><input class="form-control" type="text" name="funingation_certificate">
                        </td>
                    </tr>
                    <tr>
                        <td> Upload </td>
                        <td><input class="form-control" type="file" name="funingation_file" required>
                        </td>
                    </tr>
                    <tr>
                        <td>i. Letter Of Credit (L/C) No.</td>
                        <td><input class="form-control" type="text" name="letter_of_credit" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Date </td>
                        <td><input class="form-control" type="date" name="letter_of_credit_date" required>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload </td>
                        <td><input class="form-control" type="file" name="letter_of_credit_file" required>
                        </td>
                    </tr>
                    <tr>
                        <td>j. Doc Budget Of Availabily</td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td> Upload </td>
                        <td><input class="form-control" type="file" name="doc_budget_of_available_file" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4> <b> 4. Goverment Decree </b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>a. SPI Besi & Baja No. & Date. </td>
                        <td><input class="form-control" type="file" name="spi_besi_baja">
                        </td>
                    </tr>
                    <tr>
                        <td>b. Quota Kartu Kendali Atas SPI Besi & Baja No. & Date. </td>
                        <td><input class="form-control" type="file" name="quota_kartu_kendali">
                        </td>
                    </tr>
                    <tr>
                        <td>c. NPIK No. & Date. </td>
                        <td><input class="form-control" type="file" name="npik">
                        </td>
                    </tr>
                    <tr>
                        <td>d. Surat Pengecualin Import Lainnya. </td>
                        <td><input class="form-control" type="file" name="surat_pengecualian_import">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4> <b> 5. Import Duty & Other Tax </b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td> HS No. </td>
                        <td><input class="form-control" type="text" name="hs_no" required>
                        </td>
                    </tr>
                    <tr>
                        <td>BM. </td>
                        <td><input class="form-control" type="text" name="bm" required>
                        </td>
                    </tr>
                    <tr>
                        <td> PPN. </td>
                        <td><input class="form-control" type="text" name="ppn" required>
                        </td>
                    </tr>
                    <tr>
                        <td> PPH. </td>
                        <td><input class="form-control" type="text" name="pph" required>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                    </tr>
                </tbody>

            </table>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

@endsection
