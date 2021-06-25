<?php

namespace App\Exports;

use App\Stagaire;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;


use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;



class StagaireEnCoursExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Stagaire::select('cin','nom','prenom','email','telephone','etablisement','dateDebut','dateFin','statut')->where('statut','stage')->get();
    }


    public function map($stagaire): array
    {
        return [
            $stagaire -> cin,
            $stagaire -> nom,
            $stagaire -> prenom,
            $stagaire -> email,
            $stagaire -> telephone,
            $stagaire -> etablisement,
            $stagaire -> dateDebut,
            $stagaire -> dateFin,
            $stagaire -> statut,

        ];
    }

    public function headings(): array
    {
        return [
            'cin',
            'nom',
            'prenom',
            'email',
            'telephone',
            'etablisement',
            'dateDebut',
            'dateFin',
            'statut',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                

                $event->sheet->getStyle('A1:W1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'EB2B02'],
                        'name'      =>  'Calibri',
                        'size'      =>  15,
                        'bold'      =>  true,
                    ]
                ]);


                $event->sheet->getStyle('A1:I1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()->setARGB('C0C0C0');


            },
        ];
    }

}
