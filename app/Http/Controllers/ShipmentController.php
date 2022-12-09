<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $transaksi_id = $id;
        return view('shipment.create', compact('transaksi_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileRequest $request)
    {
        $shipment = new Shipment();
        $shipment->transaksi_id = $request->transaksi_id;
        // General information
        $shipment->subject_of_contract = $request->subject_of_contract;
        $shipment->supplier = $request->supplier;
        $shipment->contract_no = $request->contract_no;
        $shipment->quantity_contract = $request->quantity_contract;
        $shipment->contract_amount = $request->contract_amount;
        $shipment->retention_money = $request->retention_money;
        $shipment->term_of_payment = $request->term_of_payment;
        $shipment->issuing_bank_lc = $request->issuing_bank_lc;
        $shipment->delivery_term_condition = $request->delivery_term_condition;
        $shipment->pic = $request->pic;
        $shipment->function_of_good = $request->function_of_good;
        // end general information

        // 2 Information for customs cleareance

        $shipment->shipment_no = $request->shipment_no;
        $shipment->shipment_sequence = $request->shipment_sequence;
        $shipment->nama_barang = $request->nama_barang;
        $shipment->nilai_barang = $request->nilai_barang;
        $shipment->quantity_delivery = $request->quantity_delivery;
        $shipment->invoice_amount_curr = $request->invoice_amount_curr;
        $shipment->invoice_amount = $request->invoice_amount;
        $shipment->quantity_balance = $request->quantity_balance;
        $shipment->remaining_contract_curr = $request->remaining_contract_curr;
        $shipment->remaining_contract_amount = $request->remaining_contract_amount;
        $shipment->name_of_vessel = $request->name_of_vessel;
        $shipment->shipper = $request->shipper;
        $shipment->consignee = $request->consignee;
        $shipment->issuing_insurance_company = $request->issuing_insurance_company;
        $shipment->amount_of_insurance_curr = $request->amount_of_insurance_curr;
        $shipment->amount_of_insurance = $request->amount_of_insurance;
        $shipment->loading_port = $request->loading_port;
        $shipment->etd_loading_port = $request->etd_loading_port;
        $shipment->unloading_port = $request->unloading_port;
        $shipment->eta_unloading_port = $request->eta_unloading_port;
        $shipment->exp_delivery_time = $request->exp_delivery_time;
        // end

        //  3 Shipping Document file & 4. Goverment decree / if any
        $bl_file = $request->file('bl_file');
        $bl_file = $bl_file->store('shipment/bl-file');

        $invoice_file = $request->file('invoice_file');
        $invoice_file = $invoice_file->store('shipment/invoice-file');

        $packing_file = $request->file('packing_file');
        $packing_file = $packing_file->store('shipment/packing-file');

        $cert_of_origin_file = $request->file('cert_of_origin_file');
        if ($cert_of_origin_file) {
            $cert_of_origin_file = $cert_of_origin_file->store('shipment/cert-of-origin-file');
        } else {
            $cert_of_origin_file = '-';
        }

        $cert_of_origin_preferensial_file = $request->file('cert_of_origin_preferensial_file');
        if ($cert_of_origin_preferensial_file) {
            $cert_of_origin_preferensial_file = $cert_of_origin_preferensial_file->store('shipment/cert-of-origin-preferensial-file');
        } else {
            $cert_of_origin_preferensial_file = '-';
        }

        $cert_of_weight_file = $request->file('cert_of_weight_file');
        $cert_of_weight_file = $cert_of_weight_file->store('shipment/cert-of-weight-file');

        $insurance_file = $request->file('insurance_file');
        $insurance_file = $insurance_file->store('shipment/insurance-file');

        $fumigation_file = $request->file('fumigation_file');
        if ($fumigation_file) {
            $fumigation_file = $fumigation_file->store('shipment/fumigation-file');
        } else {
            $fumigation_file = '-';
        }

        $letter_of_credit_file = $request->file('letter_of_credit_file');
        $letter_of_credit_file = $letter_of_credit_file->store('shipment/letter-of-credit-file');

        $doc_budget_of_available_file = $request->file('doc_budget_of_available_file');
        $doc_budget_of_available_file = $doc_budget_of_available_file->store('shipment/doc-budget-of-available-file');

        $spi_besi_baja = $request->file('spi_besi_baja');
        if ($spi_besi_baja) {
            $spi_besi_baja = $spi_besi_baja->store('shipment/spi-besi-baja-file');
        } else {
            $spi_besi_baja = '-';
        }

        $quota_kartu_kendali = $request->file('quota_kartu_kendali');
        if ($quota_kartu_kendali) {
            $quota_kartu_kendali = $quota_kartu_kendali->store('shipment/quota-kartu-kendali-file');
        } else {
            $quota_kartu_kendali = '-';
        }

        $npik = $request->file('npik');
        if ($npik) {
            $npik = $npik->store('shipment/npik-file');
        } else {
            $npik = '-';
        }

        $surat_pengecualian_import = $request->file('surat_pengecualian_import');
        if ($surat_pengecualian_import) {
            $surat_pengecualian_import = $surat_pengecualian_import->store('shipment/surat-pengecualian-import-file');
        } else {
            $surat_pengecualian_import = '-';
        }


        // 3 Shipping Document file
        $shipment->bl_no = $request->bl_no;
        $shipment->bl_date = $request->bl_date;
        $shipment->bl_file = $bl_file;

        $shipment->invoice_no = $request->invoice_no;
        $shipment->invoice_date = $request->invoice_date;
        $shipment->invoice_file = $invoice_file;

        $shipment->packing_date = $request->packing_date;
        $shipment->packing_file = $packing_file;

        $shipment->cert_of_origin = $request->cert_of_origin;
        $shipment->cert_of_origin_file = $cert_of_origin_file;

        $shipment->cert_of_origin_preferensial = $request->cert_of_origin_preferensial;
        $shipment->cert_of_origin_preferensial_file = $cert_of_origin_preferensial_file;

        $shipment->cert_of_weight = $request->cert_of_weight;
        $shipment->cert_of_weight_file = $cert_of_weight_file;

        $shipment->insurance_document = $request->insurance_document;
        $shipment->insurance_file = $insurance_file;

        $shipment->fumigation_certificate = $request->fumigation_certificate;
        $shipment->fumigation_file = $fumigation_file;

        $shipment->letter_of_credit = $request->letter_of_credit;
        $shipment->letter_of_credit_date = $request->letter_of_credit_date;
        $shipment->letter_of_credit_file = $letter_of_credit_file;

        $shipment->doc_budget_of_available_file = $doc_budget_of_available_file;

        // 4. Goverment decree
        $shipment->spi_besi_baja = $spi_besi_baja;
        $shipment->quota_kartu_kendali = $quota_kartu_kendali;
        $shipment->npik = $npik;
        $shipment->surat_pengecualian_import = $surat_pengecualian_import;

        // 5. Import dutty & other tax
        $shipment->hs_no = $request->hs_no;
        $shipment->bm = $request->bm;
        $shipment->ppn = $request->ppn;
        $shipment->pph = $request->pph;
        $shipment->status = $request->status;

        $shipment->save();
        Alert::success('Berhasil', 'Data Berhasil disimpan.');
        return redirect()->route('shipment.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FileRequest $request, $id)
    {
        $shipment = Shipment::findOrFail($id);
        $shipment->transaksi_id = $shipment->transaksi_id;
        // General information
        $shipment->supplier = $request->supplier;
        $shipment->contract_no = $request->contract_no;
        $shipment->quantity_contract = $request->quantity_contract;
        $shipment->contract_amount = $request->contract_amount;
        $shipment->retention_money = $request->retention_money;
        $shipment->term_of_payment = $request->term_of_payment;
        $shipment->issuing_bank_lc = $request->issuing_bank_lc;
        $shipment->delivery_term_condition = $request->delivery_term_condition;
        $shipment->pic = $request->pic;
        $shipment->function_of_good = $request->function_of_good;
        // end general information

        // 2 Information for customs cleareance
        $shipment->shipment_no = $request->shipment_no;
        $shipment->shipment_sequence = $request->shipment_sequence;
        $shipment->nama_barang = $request->nama_barang;
        $shipment->nilai_barang = $request->nilai_barang;
        $shipment->quantity_delivery = $request->quantity_delivery;
        $shipment->invoice_amount_curr = $request->invoice_amount_curr;
        $shipment->invoice_amount = $request->invoice_amount;
        $shipment->quantity_balance = $request->quantity_balance;
        $shipment->remaining_contract_curr = $request->remaining_contract_curr;
        $shipment->remaining_contract_amount = $request->remaining_contract_amount;
        $shipment->name_of_vessel = $request->name_of_vessel;
        $shipment->shipper = $request->shipper;
        $shipment->consignee = $request->consignee;
        $shipment->issuing_insurance_company = $request->issuing_insurance_company;
        $shipment->amount_of_insurance_curr = $request->amount_of_insurance_curr;
        $shipment->amount_of_insurance = $request->amount_of_insurance;
        $shipment->loading_port = $request->loading_port;
        $shipment->etd_loading_port = $request->etd_loading_port;
        $shipment->unloading_port = $request->unloading_port;
        $shipment->eta_unloading_port = $request->eta_unloading_port;
        $shipment->exp_delivery_time = $request->exp_delivery_time;
        // end

        //  3 Shipping Document file & 4. Goverment decree / if any
        $bl_file = $request->file('bl_file');
        $bl_file = $bl_file->store('shipment/bl-file');

        $invoice_file = $request->file('invoice_file');
        $invoice_file = $invoice_file->store('shipment/invoice-file');

        $packing_file = $request->file('packing_file');
        $packing_file = $packing_file->store('shipment/packing-file');

        $cert_of_origin_file = $request->file('cert_of_origin_file');
        if ($cert_of_origin_file) {
            Storage::delete($shipment->cert_of_origin_file);
            $cert_of_origin_file = $cert_of_origin_file->store('shipment/cert-of-origin-file');
        } else {
            $cert_of_origin_file = $shipment->cert_of_origin_file;
        }

        $cert_of_origin_preferensial_file = $request->file('cert_of_origin_preferensial_file');
        if ($cert_of_origin_preferensial_file) {
            Storage::delete($shipment->cert_of_origin_preferensial_file);
            $cert_of_origin_preferensial_file = $cert_of_origin_preferensial_file->store('shipment/cert-of-origin-preferensial-file');
        } else {
            $cert_of_origin_preferensial_file = $shipment->cert_of_origin_preferensial_file;
        }

        $cert_of_weight_file = $request->file('cert_of_weight_file');
        $cert_of_weight_file = $cert_of_weight_file->store('shipment/cert-of-weight-file');

        $insurance_file = $request->file('insurance_file');
        $insurance_file = $insurance_file->store('shipment/insurance-file');

        $fumigation_file = $request->file('fumigation_file');
        if ($fumigation_file) {
            Storage::delete($shipment->fumigation_file);
            $fumigation_file = $fumigation_file->store('shipment/fumigation-file');
        } else {
            $fumigation_file = $shipment->fumigation_file;
        }

        $letter_of_credit_file = $request->file('letter_of_credit_file');
        $letter_of_credit_file = $letter_of_credit_file->store('shipment/letter-of-credit-file');

        $doc_budget_of_available_file = $request->file('doc_budget_of_available_file');
        $doc_budget_of_available_file = $doc_budget_of_available_file->store('shipment/doc-budget-of-available-file');

        $spi_besi_baja = $request->file('spi_besi_baja');
        if ($spi_besi_baja) {
            Storage::delete($shipment->spi_besi_baja);
            $spi_besi_baja = $spi_besi_baja->store('shipment/spi-besi-baja-file');
        } else {
            $spi_besi_baja = $shipment->spi_besi_baja;
        }

        $quota_kartu_kendali = $request->file('quota_kartu_kendali');
        if ($quota_kartu_kendali) {
            Storage::delete($shipment->quota_kartu_kendali);
            $quota_kartu_kendali = $quota_kartu_kendali->store('shipment/quota-kartu-kendali-file');
        } else {
            $quota_kartu_kendali = $shipment->quota_kartu_kendali;
        }

        $npik = $request->file('npik');
        if ($npik) {
            Storage::delete($shipment->npik);
            $npik = $npik->store('shipment/npik-file');
        } else {
            $npik = $shipment->npik;
        }

        $surat_pengecualian_import = $request->file('surat_pengecualian_import');
        if ($surat_pengecualian_import) {
            Storage::delete($shipment->surat_pengecualian_import);
            $surat_pengecualian_import = $surat_pengecualian_import->store('shipment/surat-pengecualian-import-file');
        } else {
            $surat_pengecualian_import = $shipment->surat_pengecualian_import;
        }


        // 3 Shipping Document file
        $shipment->bl_no = $request->bl_no;
        $shipment->bl_date = $request->bl_date;
        $shipment->bl_file = $bl_file;

        $shipment->invoice_no = $request->invoice_no;
        $shipment->invoice_date = $request->invoice_date;
        $shipment->invoice_file = $invoice_file;

        $shipment->packing_date = $request->packing_date;
        $shipment->packing_file = $packing_file;

        $shipment->cert_of_origin = $request->cert_of_origin;
        $shipment->cert_of_origin_file = $cert_of_origin_file;

        $shipment->cert_of_origin_preferensial = $request->cert_of_origin_preferensial;
        $shipment->cert_of_origin_preferensial_file = $cert_of_origin_preferensial_file;

        $shipment->cert_of_weight = $request->cert_of_weight;
        $shipment->cert_of_weight_file = $cert_of_weight_file;

        $shipment->insurance_document = $request->insurance_document;
        $shipment->insurance_file = $insurance_file;

        $shipment->fumigation_certificate = $request->fumigation_certificate;
        $shipment->fumigation_file = $fumigation_file;

        $shipment->letter_of_credit = $request->letter_of_credit;
        $shipment->letter_of_credit_date = $request->letter_of_credit_date;
        $shipment->letter_of_credit_file = $letter_of_credit_file;

        $shipment->doc_budget_of_available_file = $doc_budget_of_available_file;

        // 4. Goverment decree
        $shipment->spi_besi_baja = $spi_besi_baja;
        $shipment->quota_kartu_kendali = $quota_kartu_kendali;
        $shipment->npik = $npik;
        $shipment->surat_pengecualian_import = $surat_pengecualian_import;

        // 5. Import dutty & other tax
        $shipment->hs_no = $request->hs_no;
        $shipment->bm = $request->bm;
        $shipment->ppn = $request->ppn;
        $shipment->pph = $request->pph;
        $shipment->status = $request->status;

        $shipment->save();
        Alert::success('Berhasil', 'Data Berhasil Diupdate.');
        return redirect()->route('shipment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $shipment = Shipment::findOrFail($id);
        Storage::delete([$shipment->bl_file, $shipment->invoice_file, $shipment->packing_file, $shipment->cert_of_origin_file, $shipment->cert_of_origin_preferensial_file, $shipment->cert_of_weight_file, $shipment->insurance_file, $shipment->fumigation_file, $shipment->letter_of_credit_file, $shipment->doc_budget_of_available_file, $shipment->spi_besi_baja, $shipment->quota_kartu_kendali, $shipment->npik, $shipment->surat_pengecualian_import]);
        $shipment->delete();
        Alert::success('Berhasil', 'Data Berhasil Dihapus.');
        return redirect()->route('shipment.index');
    }
}