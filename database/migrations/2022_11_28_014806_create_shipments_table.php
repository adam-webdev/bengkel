<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksis')->onDelete('cascade');

            /** 1. general information */
            // a
            $table->string('subject_of_contract', 50);
            // b
            $table->string('supplier', 50);
            // c
            $table->string('contract_no', 50);
            // d
            $table->string('quantity_contract', 50);
            // e
            $table->string('contract_amount', 50);
            // f
            $table->string('retention_money', 50)->nullable();
            // g
            $table->string('term_of_payment', 50);
            // h
            $table->string('issuing_bank_lc', 50)->nullable();
            // i
            $table->string('delivery_term_condition', 20);
            // j
            $table->string('pic', 50);
            // k
            $table->string('function_of_good', 50);

            /** 2. information  for customs clearance*/
            // a
            $table->string('shipment_no', 10);
            $table->string('shipment_sequence', 10);
            // b
            $table->string('quantity_delivery', 10);
            // c
            $table->string('invoice_amount_curr', 10);
            $table->string('invoice_amount', 10);
            // d
            $table->string('quantity_balance',)->nullable();
            // e
            $table->string('remaining_contract_curr', 10);
            $table->string('remaining_contract_amount', 10);
            // f
            $table->string('name_of_vessel', 50);
            // g
            $table->string('shipper', 50);
            // h
            $table->string('consignee', 50);
            // i
            $table->string('issuing_insurance_company', 50);
            // j
            $table->string('amount_of_insurance_curr', 50);
            $table->string('amount_of_insurance', 10);
            // k
            $table->string('loading_port', 50);
            // l
            $table->date('etd_loading_port', 10);
            // m
            $table->string('unloading_port', 50);
            // n
            $table->date('eta_unloading_port', 10);
            // o
            $table->date('exp_delivery_time', 10);

            /** 3. shipping document */
            // a.
            $table->string('bl_no', 50);
            $table->date('bl_date');
            $table->string('bl_file');
            // b.
            $table->string('invoice_no', 50);
            $table->string('invoice_date');
            $table->string('invoice_file');
            // c.
            $table->string('packing_date');
            $table->string('packing_file');
            // d.
            $table->string('cert_of_origin', 50)->nullable();
            $table->string('cert_of_origin_file')->nullable();
            // e
            $table->string('cert_of_origin_preferensial', 50)->nullable();
            $table->string('cert_of_origin_preferensial_file')->nullable();
            // f.
            $table->string('cert_of_weight', 50);
            $table->string('cert_of_weight_file');
            // g.
            $table->string('insurance_document', 50);
            $table->string('insurance_file');
            // h.
            $table->string('fumigation_certificate', 50)->nullable();
            $table->string('fumigation_file')->nullable();
            // i.
            $table->string('letter_of_credit', 50);
            $table->string('letter_of_credit_file');
            $table->date('letter_of_credit_date');
            // j.
            $table->string('doc_budget_of_available_file');

            /** 4. Goverment decree */
            // a.
            $table->string('spi_besi_baja')->nullable();
            // b.
            $table->string('quota_kartu_kendali')->nullable();
            // c.
            $table->string('npik')->nullable();
            // d.
            $table->string('surat_pengecualian_import')->nullable();

            /** 5. Import duty & other tax */
            $table->string('hs_no', 50);
            $table->string('bm', 50);
            $table->string('ppn', 50);
            $table->string('pph', 50);
            $table->string('status_approve', 50)->default('Belum di approve');
            $table->string('status', 50);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}