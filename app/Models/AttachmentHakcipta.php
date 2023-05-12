<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttachmentHakcipta extends Model
{
    use HasFactory, HasUuids;

    protected $appends = [
        'salinan_resmi_akta_pendirian_badan_hukum_url',
        'scan_npwp_url',
        'contoh_ciptaan_url',
        'scan_ktp_url',
        'surat_pernyataan_url',
        'bukti_pengalihan_hak_cipta_url',
    ];

    protected $fillable = [
        "detail_hakcipta_id",
        "salinan_resmi_akta_pendirian_badan_hukum",
        "scan_npwp",
        "contoh_ciptaan",
        "link_contoh_ciptaan",
        "scan_ktp",
        "surat_pernyataan",
        "bukti_pengalihan_hak_cipta"
    ];
    
    protected function salinanResmiAktaPendirianBadanHukumUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => asset('storage/' . $this->salinan_resmi_akta_pendirian_badan_hukum),
        );
    }

    protected function scanNpwpUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => asset('storage/' . $this->scan_npwp),
        );
    }

    protected function contohCiptaanUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => asset('storage/' . $this->contoh_ciptaan),
        );
    }

    protected function scanKtpUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => asset('storage/' . $this->scan_ktp),
        );
    }

    protected function suratPernyataanUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => asset('storage/' . $this->surat_pernyataan),
        );
    }

    protected function buktiPengalihanHakCiptaUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => asset('storage/' . $this->bukti_pengalihan_hak_cipta),
        );
    }
}
