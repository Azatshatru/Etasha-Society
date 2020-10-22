<?php
$applicants = [];
foreach($donations as $enquiry)
{
    $applicants[] = [
        'Name' => $enquiry->name,
        'Email' => $enquiry->email,
        'Address' => $enquiry->address,
        'Contact No.' => $enquiry->phone,
        'Donations material' => $enquiry->donations_material,
        'Drop or Pickup' => $enquiry->drop_pickup,
		'Date' => $this->Time->format($enquiry->created, 'dd MMM yyyy'),
    ];
}

$this->Excel->addWorksheet($applicants, 'Applicants');
