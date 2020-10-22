<?php
$applicants = [];
foreach($enquiries as $enquiry)
{
    $applicants[] = [
        'Email' => $enquiry->email,
        'Date' => $this->Time->format($enquiry->created, 'dd MMM yyyy'),
    ];
}

$this->Excel->addWorksheet($applicants, 'Applicants');
