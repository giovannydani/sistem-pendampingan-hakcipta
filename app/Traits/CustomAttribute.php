<?php
namespace App\Traits;

/**
 * 
 */
trait CustomAttribute
{
    public function ajuanAttribute()
    {
        $attribute = [
            'application_type_id' => 'Jenis Permohonan',
            'creation_type_id' => 'Jenis Ciptaan',
            'creation_subtype_id' => 'Sub-Jenis Ciptaan',
            'title' => 'Judul',
            'short_description' => 'Uraian Singkat Ciptaan',
            'first_announced_date' => 'Tanggal Pertama Kali Diumumkan',
            'first_announced_country_id' => 'Negara Pertama Kali Diumumkan',
            'first_announced_city' => 'Kota Pertama Kali Diumumkan',
        ];

        return $attribute;
    }
}

?>