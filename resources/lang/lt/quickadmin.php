<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'employees' => [		'title' => 'Employees',		'fields' => [			'first-name' => 'First name',			'last-name' => 'Last name',			'job-title' => 'Job title',			'email' => 'Email',			'phone' => 'Phone',		],	],
		'contact-management' => [		'title' => 'Contact management',		'fields' => [		],	],
		'contact-companies' => [		'title' => 'Companies',		'fields' => [			'name' => 'Company name',			'address' => 'Address',			'website' => 'Website',			'email' => 'Email',		],	],
		'contacts' => [		'title' => 'Contacts',		'fields' => [			'company' => 'Company',			'first-name' => 'First name',			'last-name' => 'Last name',			'phone1' => 'Phone 1',			'phone2' => 'Phone 2',			'email' => 'Email',			'address' => 'Address',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Laikas',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
		'equipments' => [		'title' => 'Equipments',		'fields' => [			'name' => 'Name',			'is-available' => 'Is available',		],	],
		'task-management' => [		'title' => 'Task Management',		'fields' => [		],	],
		'tasks' => [		'title' => 'Tasks',		'fields' => [			'title' => 'Title',			'description' => 'Description',			'equipment' => 'Equipment',			'start-time' => 'Start time',			'end-time' => 'End time',			'employee' => 'Employee',			'status' => 'Status',		],	],
		'statuses' => [		'title' => 'Statuses',		'fields' => [			'name' => 'Name',		],	],
	'qa_save' => 'Išsaugoti',
	'qa_update' => 'Atnaujinti',
	'qa_list' => 'Sąrašas',
	'qa_no_entries_in_table' => 'Įrašų nėra.',
	'qa_create' => 'Sukurti',
	'qa_edit' => 'Redaguoti',
	'qa_view' => 'Peržiūrėti',
	'qa_custom_controller_index' => 'Papildomo Controller\'io puslapis.',
	'qa_logout' => 'Atsijungti',
	'qa_add_new' => 'Pridėti naują',
	'qa_are_you_sure' => 'Ar esate tikri?',
	'qa_back_to_list' => 'Grįžti į sąrašą',
	'qa_dashboard' => 'Pagrindinis',
	'qa_delete' => 'Trinti',
	'qa_restore' => 'Atstatyti',
	'qa_permadel' => 'Ištrinti galutinai',
	'qa_all' => 'Rodyti viską',
	'qa_trash' => 'Rodyti ištrintus',
	'qa_delete_selected' => 'Trinti pažymėtus',
	'qa_category' => 'Kategorija',
	'qa_categories' => 'Kategorijos',
	'qa_sample_category' => 'Pavyzdinė kategorija',
	'qa_time' => 'Laikas',
	'qa_questions' => 'Klausimai',
	'qa_question' => 'Klausimas',
	'qa_answer' => 'Atsakymas',
	'qa_sample_question' => 'Pavyzdinis klausimas',
	'qa_sample_answer' => 'Pavyzdinis atsakymas',
	'qa_faq_management' => 'DUK valdymas',
	'qa_administrator_can_create_other_users' => 'Administratorius (gali kurti kitus vartotojus)',
	'qa_title' => 'Pavadinimas',
	'qa_roles' => 'Rolės',
	'qa_role' => 'Rolė',
	'qa_user_management' => 'Vartotojų valdymas',
	'qa_users' => 'Vartotojai',
	'qa_user' => 'Vartotojas',
	'qa_name' => 'Vardas',
	'qa_email' => 'El. Paštas',
	'qa_password' => 'Slaptažodis',
	'qa_user_actions' => 'Vartotojų veiksmai',
	'qa_campaign' => 'Kampanija',
	'qa_campaigns' => 'Kampanijos',
	'qa_description' => 'Aprašymas',
	'qa_valid_from' => 'Galioja nuo',
	'qa_valid_to' => 'Galioja iki',
	'qa_code' => 'Kodas',
	'qa_time_management' => 'Laiko valdymas',
	'qa_projects' => 'Projektai',
	'qa_time_entries' => 'Laiko įrašai',
	'qa_project' => 'Projektas',
	'qa_expenses' => 'Išlaidos',
	'qa_address' => 'Adresas',
	'qa_contact_management' => 'Kontaktų valdymas',
	'qa_contacts' => 'Kontaktai',
	'qa_first_name' => 'Vardas',
	'qa_last_name' => 'Pavardė',
	'qa_product_management' => 'Produktų valdymas',
	'qa_products' => 'Produktai',
	'qa_price' => 'Kaina',
	'qa_tags' => 'Žymos',
	'qa_tag' => 'Žyma',
	'qa_calendar' => 'Kalendorius',
	'qa_statuses' => 'Būsenos',
	'qa_task_management' => 'Užduočių valdymas',
	'qa_tasks' => 'Užduotys',
	'qa_status' => 'Būsena',
	'qa_text' => 'Tekstas',
	'qa_excerpt' => 'Ištrauka',
	'qa_pages' => 'Puslapiai',
	'qa_simple_user' => 'Paprastas vartotojas',
	'qa_permissions' => 'Leidimai',
	'qa_discount_amount' => 'Nuolaidos suma',
	'qa_discount_percent' => 'Nuolaida procentais',
	'qa_coupons_amount' => 'Kuponų kiekis',
	'qa_coupons' => 'Kuponai',
	'qa_coupon_management' => 'Kuponų valdymas',
	'qa_reports' => 'Ataskaitos',
	'qa_start_time' => 'Pradžios laikas',
	'qa_end_time' => 'Pabaigos laikas',
	'qa_expense_category' => 'Išlaidų kategorija',
	'qa_expense_categories' => 'Išlaidų kategorijos',
	'qa_expense_management' => 'Išlaidų valdymas',
	'qa_expense' => 'Išlaidos',
	'qa_companies' => 'Įmonės',
	'qa_company_name' => 'Įmonės pavadinimas',
	'qa_website' => 'Interneto svetainė',
	'qa_company' => 'Įmonė',
	'qa_phone' => 'Telefonas',
	'qa_photo' => 'Nuotrauka (maks. 8 MB)',
	'qa_category_name' => 'Kategorijos pavadinimas',
	'qa_product_name' => 'Produkto pavadinimas',
	'qa_remember_token' => 'Prisiminti',
	'qa_phone1' => 'Telefonas nr. 1',
	'qa_phone2' => 'Telefono nr. 2',
	'qa_slug' => 'Url',
	'qa_current_password' => 'Dabartinis slaptažodis',
	'qa_new_password' => 'Naujas slaptažodis',
	'qa_password_confirm' => 'Pakartoti naują slaptažodį',
	'qa_remember_me' => 'Prisiminti mane',
	'qa_login' => 'Prisijungti',
	'qa_print' => 'Spausdinti',
	'qa_copy' => 'Kopijuoti',
	'qa_register' => 'Registruotis',
	'qa_registration' => 'Registracija',
	'quickadmin_title' => 'Appointments',
];