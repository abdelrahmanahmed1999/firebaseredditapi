<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
        //return User::select('name','email','roles_name')->get();

    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Roles',
        ];
    }
}
