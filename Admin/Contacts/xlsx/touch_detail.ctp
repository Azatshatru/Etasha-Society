<?php
$applicants = [];
foreach($contacts as $enquiry)
{
    $applicants[] = [
        'Name' => $enquiry->name,
        'Email' => $enquiry->email,
        'Contact No.' => $enquiry->phone,
		'age' => $enquiry->age,
        'Address' => $enquiry->addres,
        'Profession' => $enquiry->profession,
		'Sex' => $enquiry->sex,
        'How did you hear about ETASHA' => $enquiry->about_first,
        'Would you like to receive our Newsletter' => ($enquiry->about_second==1)?'Yes':'No',
        'Comment' => $enquiry->comment,
		'Enquiry Date' => $this->Time->format($enquiry->created, 'dd MMM yyyy ') 
		
    ];
}

$this->Excel->addWorksheet($applicants, 'Applicants');
