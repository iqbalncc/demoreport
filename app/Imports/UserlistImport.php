<?php

namespace App\Imports;

use App\Userlist;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use DB;
HeadingRowFormatter::default('none');

class UserlistImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {   
            return new Userlist ([
                'userId'    => $row['USER ID'],
                'firstName' => $row['FIRST NAME'],
                'lastName'  => $row['LAST NAME'],
                'emailAddress'    => $row['EMAIL ADDRESS'],
                'userStatus'    => $row['USER STATUS'],
                'role'   => $row['ROLE'],
                'createdDate'     => $row['CREATED DATE'],
                'lastLoginDate'     => $row['LAST LOGIN DATE'],
                'lastContentAccess'  => $row['LAST CONTENT ACCESS DATE'],
                'audience'   => $row['AUDIENCE'],
                'userPolicyAgreementDate'      => $row['USE POLICY AGREEMENT DATE'],
                'accountCreated'  => $row['ACCOUNT CREATED'],
                'accountDeactive'    => $row['ACCOUNT DEACTIVATION DATE SCHEDULED'],
                'licenseBusiness'      => $row['LICENSE - BUSINESS'],
                'licenseTech'   => $row['LICENSE - TECHNOLOGY AND DEVELOPER'],
                'licenseProductivity'   => $row['LICENSE - PRODUCTIVITY AND COLLABORATION'],
                'licenseSldp'   => $row['LICENSE - SLDP'],
                'licenseDigitalTrans'   => $row['LICENSE - DIGITAL TRANSFORMATION'],
                'licenseSkillsoftEssensials'   => $row['LICENSE - SKILLSOFT ESSENTIALS'],
                'licenseSkillsoftAdvance'   => $row['LICENSE - SKILLSOFT ADVANCE'],
                'licenseSkillsoftExpert'   => $row['LICENSE SKILLSOFT EXPERT'],
                'relation'   => $row['RELATION'],

                // 'course_fees'   => $row['NCC GROUPS'],
                // 'course_fees'   => $row['GROUP OF PROSPECTS'],
                // 'course_fees'   => $row['GRNCC LEVELS'],
                // 'course_fees'   => $row['CLIENT TEAM'],
            ]);

        }
        
        // public function rules(): array
        // {
        //     return [
        //         '*.userid' => 'required',
        //         '*.coursetitle' => 'required|string',
        //         '*.datejoin' => 'required|dateformat:dmY',
        //         '*.datestart' => 'required|dateformat:dmY',
        //         '*.dateend' => 'required|dateformat:dmY',
        //         '*.coursefees' => 'numeric',
        //     ];
        // }
}
