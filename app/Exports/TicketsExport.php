<?php

namespace App\Exports;

use App\Tickets;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class TicketsExport implements FromCollection , WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tickets::all('id','collectiondate',
        'collectorname',
        'collectionlga',
        'transID',
        'payername',
        'payerID',
        'payerphone',
        'vehicleno',
        'payerlga',
        'amount','created_at');
    }

    public function headings(): array
    {
        
        return [
            'No',
            'Collection Date',
            'Collector Name',
            'Collection LGA',
            'Transaction ID',
            'Payer Name',
            'Payer ID',
            'Payer Phone Number',
            'Vehicle Number',
            'Payer LGA',
            'Aount',
            'Date of Entry'
        ];
    }
}